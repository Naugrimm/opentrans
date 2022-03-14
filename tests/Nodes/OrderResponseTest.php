<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use DateTimeImmutable;
use JMS\Serializer\SerializerInterface;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\OpenTrans\Nodes\OrderResponse;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\TestCase;
use \JMS\Serializer\SerializerBuilder;

class OrderResponseTest extends TestCase
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
                    'id' => 'order-id-1',
                    'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                    'sequenceId' => 1,
                    'parties' => [
                        [
                            'id' => ['value' => 'org.de.supplier', 'type' => 'supplier']
                        ],
                        [
                            'id' => ['value' => 'org.de.buyer', 'type' => 'buyer']
                        ],
                    ],
                    'partiesReference' => [
                        'buyerIdRef' => [
                            'value' => 'org.de.buyer',
                        ],
                        'supplierIdRef' => [
                            'value' => 'org.de.buyer',
                        ],
                    ]
                ]
            ],
            'items' => [
                [
                    'lineItemId' => 'line-item-id-1',
                    'productId' => [
                        'supplierPid' => [
                            'value' => 'product-number-1'
                        ]
                    ],
                    'quantity' => 5,
                    'orderUnit' => 'C62',
                ]
            ],
            'summary' => [
                'totalItemNum' => 1,
            ]
        ], new OrderResponse());


        $xml = $this->serializer->serialize($node, 'xml');

        $this->assertEquals(file_get_contents(__DIR__.'/../assets/minimal_valid_orderresponse.xml'), $xml);

        $this->assertTrue(SchemaValidator::isValid($xml, '2.1'));
    }
}
