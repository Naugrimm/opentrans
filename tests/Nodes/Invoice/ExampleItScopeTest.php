<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Tests\Nodes\Invoice;

use JMS\Serializer\SerializerBuilder;
use Naugrim\BMEcat\Exception\SchemaValidationException;
use Naugrim\OpenTrans\Nodes\Invoice;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\TestCase;

class ExampleItScopeTest extends TestCase
{
    public function testInvoice(): void
    {
        $serializer = SerializerBuilder::create()->build();
        $xml = (string) file_get_contents(__DIR__.'/../../assets/Example_INVOICE_Testdistributor_Rechnung.xml');
        $xml = str_replace(["\t", "\r\n"], ["  ", "\n"], $xml);
        $this->assertTrue(SchemaValidator::isValid($xml, '2.1'));

        $doc = $serializer->deserialize($xml, Invoice::class, 'xml');

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
}
