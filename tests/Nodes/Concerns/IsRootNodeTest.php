<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Tests\Nodes\Concerns;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Contracts\OpentransDocumentNode;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\DispatchNotification;
use Naugrim\OpenTrans\Nodes\Invoice;
use Naugrim\OpenTrans\Nodes\Order;
use Naugrim\OpenTrans\Nodes\OrderChange;
use Naugrim\OpenTrans\Nodes\OrderResponse;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use JMS\Serializer\Annotation as Serializer;

/**
 * Test class that uses IsRootNode trait but does NOT have XmlRoot attribute
 * This is used to test the exception handling in getXmlRootElementName()
 *
 * @implements NodeInterface<TestClassWithoutXmlRootAttribute>
 */
class TestClassWithoutXmlRootAttribute implements NodeInterface, OpentransDocumentNode
{
    use HasSerializableAttributes;
    use IsRootNode;
}

/**
 * Test class that has XmlRoot attribute but with no arguments
 * This is used to test the exception handling in getXmlRootElementName()
 *
 * @implements NodeInterface<TestClassWithEmptyXmlRootAttribute>
 */
#[Serializer\XmlRoot()]
class TestClassWithEmptyXmlRootAttribute implements NodeInterface, OpentransDocumentNode
{
    use HasSerializableAttributes;
    use IsRootNode;
}

class IsRootNodeTest extends TestCase
{
    /**
     * @return array<string, array{class: class-string, expectedRootName: string}>
     */
    public static function provideRootNodeClasses(): array
    {
        return [
            'Order' => [
                'class' => Order::class,
                'expectedRootName' => 'ORDER',
            ],
            'OrderResponse' => [
                'class' => OrderResponse::class,
                'expectedRootName' => 'ORDERRESPONSE',
            ],
            'OrderChange' => [
                'class' => OrderChange::class,
                'expectedRootName' => 'ORDERCHANGE',
            ],
            'Invoice' => [
                'class' => Invoice::class,
                'expectedRootName' => 'INVOICE',
            ],
            'DispatchNotification' => [
                'class' => DispatchNotification::class,
                'expectedRootName' => 'DISPATCHNOTIFICATION',
            ],
        ];
    }

    /**
     * @param class-string $class
     */
    #[DataProvider('provideRootNodeClasses')]
    public function testGetXmlRootElementName(string $class, string $expectedRootName): void
    {
        /** @var \Naugrim\OpenTrans\Contracts\OpentransDocumentNode $instance */
        $instance = new $class();

        $this->assertSame($expectedRootName, $instance->getXmlRootElementName());
    }

    public function testGetXmlRootElementNameThrowsExceptionWhenXmlRootAttributeIsMissing(): void
    {
        $instance = new TestClassWithoutXmlRootAttribute();

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('XmlRoot attribute not found on class ' . TestClassWithoutXmlRootAttribute::class);

        $instance->getXmlRootElementName();
    }

    public function testGetXmlRootElementNameThrowsExceptionWhenXmlRootAttributeHasNoArguments(): void
    {
        $instance = new TestClassWithEmptyXmlRootAttribute();

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('XmlRoot attribute has no arguments on class ' . TestClassWithEmptyXmlRootAttribute::class);

        $instance->getXmlRootElementName();
    }
}
