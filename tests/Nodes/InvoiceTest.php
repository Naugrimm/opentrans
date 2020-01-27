<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use DateTimeImmutable;
use JMS\Serializer\SerializerInterface;
use Naugrim\OpenTrans\Builder\NodeBuilder;
use Naugrim\OpenTrans\Nodes\Invoice;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\TestCase;
use \JMS\Serializer\SerializerBuilder;

class InvoiceTest extends TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp(): void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testMinimalInvoice()
    {
        $node = NodeBuilder::fromArray([
            'header' => [
                'info' => [
                    'id' => 'invoice-id-1',
                    'date' => (new DateTimeImmutable())->format('Y-m-d'),
                    'parties' => [
                        [
                            'id' => 'org.de.issuer'
                        ],
                        [
                            'id' => 'org.de.rcpt'
                        ],
                    ],
                    'issuerIdRef' => 'org.de.issuer',
                    'rcptIdRef' => 'org.de.rcpt',
                    'currency' => 'EUR'
                ]
            ],
            'items' => [
                [
                    'lineItemId' => 'line-item-id-1',
                    'productId' => [],
                    'quantity' => 10,
                    'orderUnit' => 'C62',
                    'priceFix' => [
                        'amount' => 123
                    ],
                    'priceLineAmount' => 10 * 123,
                ]
            ],
            'summary' => [
                'totalItemNum' => 1,
                'netValueGoods' => 10 * 123,
                'totalAmount' => (10 * 123) * 1.19,
                'totalTax' => [
                    [
                        'amount' => (10 * 123) * 0.19
                    ]
                ]
            ]
        ], new Invoice());


        $xml = $this->serializer->serialize($node, 'xml');

        $this->assertEquals(file_get_contents(__DIR__.'/../assets/minimal_valid_invoice.xml'), $xml);

        $this->assertTrue(SchemaValidator::isValid($xml, '2.1'));
    }
}
