<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Tests\Nodes\ExampleDocuments;

use DirectoryIterator;
use JMS\Serializer\SerializerBuilder;
use Naugrim\BMEcat\Exception\SchemaValidationException;
use Naugrim\OpenTrans\Nodes\DispatchNotification;
use Naugrim\OpenTrans\Nodes\Invoice;
use Naugrim\OpenTrans\Nodes\Order;
use Naugrim\OpenTrans\Nodes\OrderResponse;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\TestCase;
use Rector\Testing\Fixture\FixtureFileFinder;

class ExampleDocumentsTest extends TestCase
{
    public static function provideExampleFileData(): \Iterator
    {
        foreach (FixtureFileFinder::yieldDirectory(__DIR__.'/../../assets/Examples/DispatchNotification', '*.xml') as $file) {
            yield [DispatchNotification::class, $file[0]];
        }

        foreach (FixtureFileFinder::yieldDirectory(__DIR__.'/../../assets/Examples/Invoice', '*.xml') as $file) {
            yield [Invoice::class, $file[0]];
        }

        foreach (FixtureFileFinder::yieldDirectory(__DIR__.'/../../assets/Examples/Order', '*.xml') as $file) {
            yield [Order::class, $file[0]];
        }

        foreach (FixtureFileFinder::yieldDirectory(__DIR__.'/../../assets/Examples/OrderResponse', '*.xml') as $file) {
            yield [OrderResponse::class, $file[0]];
        }
    }

    /**
     * @dataProvider provideExampleFileData()
     */
    public function testExampleDocuments(string $rootNodeType, string $fileName): void
    {
        $serializer = SerializerBuilder::create()->build();
        $xml = (string) file_get_contents($fileName);

        $this->assertTrue(SchemaValidator::isValid($xml, '2.1'));

        $doc = $serializer->deserialize($xml, $rootNodeType, 'xml');

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
