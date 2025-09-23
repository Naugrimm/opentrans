<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Tests;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Exception\InvalidRootNodeException;
use Naugrim\OpenTrans\Exception\InvalidTypeException;
use Naugrim\OpenTrans\Nodes\Invoice;
use Naugrim\OpenTrans\Nodes\Order;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Naugrim\OpenTrans\Contracts\OpentransDocumentNode;

/**
 * Test class that implements NodeInterface but NOT OpentransDocumentNode
 * Used to test type validation in SchemaValidator
 *
 * @implements NodeInterface<TestClassWithoutOpentransInterface>
 */
class TestClassWithoutOpentransInterface implements NodeInterface
{
    use HasSerializableAttributes;
}

class SchemaValidatorTest extends TestCase
{
    /**
     * @return array<string, array{xml: string, type: class-string, expectedRootElement: string, actualRootElement: string}>
     */
    public static function provideInvalidRootNodeData(): array
    {
        return [
            'Order type with Invoice XML' => [
                'xml' => '<?xml version="1.0" encoding="UTF-8"?><INVOICE xmlns="http://www.opentrans.org/XMLSchema/2.1" version="2.1"></INVOICE>',
                'type' => Order::class,
                'expectedRootElement' => 'ORDER',
                'actualRootElement' => 'INVOICE',
            ],
            'Invoice type with Order XML' => [
                'xml' => '<?xml version="1.0" encoding="UTF-8"?><ORDER xmlns="http://www.opentrans.org/XMLSchema/2.1" version="2.1"></ORDER>',
                'type' => Invoice::class,
                'expectedRootElement' => 'INVOICE',
                'actualRootElement' => 'ORDER',
            ],
            'Order type with completely wrong XML' => [
                'xml' => '<?xml version="1.0" encoding="UTF-8"?><WRONGELEMENT xmlns="http://www.opentrans.org/XMLSchema/2.1" version="2.1"></WRONGELEMENT>',
                'type' => Order::class,
                'expectedRootElement' => 'ORDER',
                'actualRootElement' => 'WRONGELEMENT',
            ],
        ];
    }

    /**
     * @param class-string $type
     */
    #[DataProvider('provideInvalidRootNodeData')]
    public function testValidateRootNodeThrowsExceptionForWrongRootElement(
        string $xml,
        string $type,
        string $expectedRootElement,
        string $actualRootElement
    ): void {
        $this->expectException(InvalidRootNodeException::class);
        $this->expectExceptionMessage(
            sprintf('Expected root element "%s" but found "%s"', $expectedRootElement, $actualRootElement)
        );

        SchemaValidator::isValid($xml, '2.1', $type);
    }

    public function testValidateRootNodeThrowsExceptionForMalformedXml(): void
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';

        $this->expectException(InvalidRootNodeException::class);
        $this->expectExceptionMessage('XML document has no root element');

        SchemaValidator::isValid($xml, '2.1', Order::class);
    }

    public function testValidateRootNodePassesForCorrectRootElement(): void
    {
        // This test verifies that validation passes when the root element matches
        // We'll use a minimal valid XML structure that should pass root validation
        // but may fail schema validation (which is expected and handled separately)
        $xml = '<?xml version="1.0" encoding="UTF-8"?><ORDER xmlns="http://www.opentrans.org/XMLSchema/2.1" version="2.1"></ORDER>';

        try {
            SchemaValidator::isValid($xml, '2.1', Order::class);
            // If we reach this point, no InvalidRootNodeException was thrown
            $this->addToAssertionCount(1);
        } catch (InvalidRootNodeException $e) {
            $this->fail('Root node validation should have passed but threw: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Other exceptions (like schema validation failures) are expected and acceptable for this test
            // We only care that InvalidRootNodeException was NOT thrown
            $this->addToAssertionCount(1);
        }
    }

    public function testValidateRootNodeThrowsExceptionForNonExistentClass(): void
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?><ORDER xmlns="http://www.opentrans.org/XMLSchema/2.1" version="2.1"></ORDER>';
        $nonExistentClass = 'NonExistentClass';

        $this->expectException(InvalidTypeException::class);
        $this->expectExceptionMessage(sprintf('Class "%s" does not exist', $nonExistentClass));

        SchemaValidator::isValid($xml, '2.1', $nonExistentClass);
    }

    public function testValidateRootNodeThrowsExceptionForClassNotImplementingInterface(): void
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?><ORDER xmlns="http://www.opentrans.org/XMLSchema/2.1" version="2.1"></ORDER>';

        $this->expectException(InvalidTypeException::class);
        $this->expectExceptionMessage(
            sprintf(
                'Class "%s" does not implement the required interface "%s"',
                TestClassWithoutOpentransInterface::class,
                'Naugrim\OpenTrans\Contracts\OpentransDocumentNode'
            )
        );

        SchemaValidator::isValid($xml, '2.1', TestClassWithoutOpentransInterface::class);
    }

    public function testValidateRootNodeThrowsExceptionForStandardClass(): void
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?><ORDER xmlns="http://www.opentrans.org/XMLSchema/2.1" version="2.1"></ORDER>';

        $this->expectException(InvalidTypeException::class);
        $this->expectExceptionMessage(
            sprintf(
                'Class "%s" does not implement the required interface "%s"',
                \stdClass::class,
                OpentransDocumentNode::class
            )
        );

        SchemaValidator::isValid($xml, '2.1', \stdClass::class);
    }
}
