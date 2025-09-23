<?php

namespace Naugrim\OpenTrans;

use DOMDocument;
use Naugrim\BMEcat\Exception\SchemaValidationException;
use Naugrim\BMEcat\Exception\UnsupportedVersionException;
use Naugrim\OpenTrans\Contracts\OpentransDocumentNode;
use Naugrim\OpenTrans\Exception\InvalidRootNodeException;
use Naugrim\OpenTrans\Exception\InvalidTypeException;
use ReflectionClass;

class SchemaValidator
{
    /**
     * @var array<string, string>
     */
    protected static array $SCHEMA_MAP = [
        '2.1' => __DIR__ . '/schemas/opentrans_2_1.xsd',
    ];

    /**
     * Validates the given XML-string against the BMEcat XSD-files.
     *
     * @param $documentType ?class-string<OpentransDocumentNode>
     */
    public static function isValid(string $xml, string $version = '2005.1', ?string $documentType = null): bool
    {
        libxml_use_internal_errors(true);

        $xmlValidate = new DOMDocument();
        $xmlValidate->loadXML($xml);

        if ($documentType !== null) {
            // Validate that the type parameter is a valid class that implements OpentransDocumentNode
            self::validateTypeParameter($documentType);

            self::validateRootNode($xmlValidate, $documentType);
        }

        $schemaFile = self::getSchemaForVersion($version);
        $validated = $xmlValidate->schemaValidate($schemaFile);
        if (! $validated) {
            throw SchemaValidationException::withErrors($xml, $schemaFile, libxml_get_errors());
        }

        libxml_use_internal_errors(false);
        libxml_clear_errors();
        return $validated;
    }

    protected static function getSchemaForVersion(string $version): string
    {
        $schema = self::$SCHEMA_MAP[$version] ?? null;

        if ($schema !== null) {
            return $schema;
        }

        throw new UnsupportedVersionException('Please provide an XSD schema for this version/type.');
    }

    /**
     * @param class-string<OpentransDocumentNode> $documentType
     */
    private static function validateRootNode(DOMDocument $xmlValidate, string $documentType): void
    {
        if (! $xmlValidate->documentElement instanceof \DOMElement) {
            throw new InvalidRootNodeException('XML document has no root element');
        }

        /** @var OpentransDocumentNode $instance */
        $instance = new $documentType();
        $expectedRootElement = $instance->getXmlRootElementName();

        $actualRootElement = $xmlValidate->documentElement->nodeName;

        if ($expectedRootElement !== $actualRootElement) {
            throw InvalidRootNodeException::create($expectedRootElement, $actualRootElement);
        }
    }

    /**
     * Validates that the provided type parameter is a valid class that implements OpentransDocumentNode.
     *
     * @param string $type The class name to validate
     * @phpstan-assert class-string<OpentransDocumentNode> $type
     */
    private static function validateTypeParameter(string $type): void
    {
        if (! class_exists($type)) {
            throw InvalidTypeException::classDoesNotExist($type);
        }

        $reflection = new ReflectionClass($type);
        if (! $reflection->implementsInterface(OpentransDocumentNode::class)) {
            throw InvalidTypeException::classDoesNotImplementInterface($type, OpentransDocumentNode::class);
        }
    }
}
