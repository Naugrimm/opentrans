<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Tests\Nodes\Order;

use JMS\Serializer\SerializerBuilder;
use Naugrim\BMEcat\Exception\SchemaValidationException;
use Naugrim\OpenTrans\Nodes\Invoice;
use Naugrim\OpenTrans\Nodes\Order;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\TestCase;

class ExampleItScopeOrderTest extends TestCase
{
    /**
     * @dataProvider provideData()
     */

    public function testOrder(string $fileName): void
    {
        $serializer = SerializerBuilder::create()->build();
        $xml = (string) file_get_contents($fileName);

        $this->assertTrue(SchemaValidator::isValid($xml, '2.1'));

        $doc = $serializer->deserialize($xml, Order::class, 'xml');

        $newXml = $serializer->serialize($doc, 'xml');

        $isValid = false;
        try {
            $isValid = SchemaValidator::isValid($newXml, '2.1');
        } catch (SchemaValidationException $schemaValidationException) {
            var_dump($newXml);
            var_dump((string) $schemaValidationException);
        }

        $this->assertTrue($isValid);

        $this->assertXmlStringEqualsXmlString($xml, $newXml);

    }

    public static function provideData(): \Iterator
    {
        yield [__DIR__.'/../../assets/Example_ORDER_Testdistributor_Bestellung.xml'];
        yield [__DIR__.'/../../assets/Example_ORDER_Testdistributor_Bestellung_Eigener_Lieferschein.xml'];
        yield [__DIR__.'/../../assets/Example_ORDER_Testdistributor_Bestellung_Projekt.xml'];
    }


}
