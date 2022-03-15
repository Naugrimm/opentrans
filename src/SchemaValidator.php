<?php

namespace Naugrim\OpenTrans;

use DOMDocument;
use Naugrim\BMEcat\Exception\SchemaValidationException;
use Naugrim\BMEcat\Exception\UnsupportedVersionException;

class SchemaValidator
{
    protected static $SCHEMA_MAP = [
        '2.1' => __DIR__ . '/schemas/opentrans_2_1.xsd',
    ];

    /**
     * Validates the given XML-string against the BMEcat XSD-files.
     *
     * @param string $xml
     *
     * @param string $version
     * @param string|null $type
     * @return bool
     * @throws SchemaValidationException
     * @throws UnsupportedVersionException
     */
    public static function isValid(string $xml, string $version = '2005.1', string $type = null)
    {
        libxml_use_internal_errors(true);

        $xmlValidate = new DOMDocument();
        $xmlValidate->loadXML($xml);
        $schemaFile = self::getSchemaForVersion($version, $type);
        $validated = $xmlValidate->schemaValidate($schemaFile);
        if (!$validated) {
            throw SchemaValidationException::withErrors($xml, $schemaFile, libxml_get_errors());
        }

        libxml_use_internal_errors(false);
        libxml_clear_errors();
        return $validated;
    }

    /**
     * @param string $version
     * @param string|null $type
     * @return string
     * @throws UnsupportedVersionException
     */
    protected static function getSchemaForVersion(string $version, string $type = null): string
    {
        $schema = self::$SCHEMA_MAP[$version] ?? null;

        if (is_array($schema)) {
            $schema = $schema[$type] ?? null;
        }

        if ($schema) {
            return $schema;
        }

        throw new UnsupportedVersionException('Please provide an XSD schema for this version/type.');
    }
}
