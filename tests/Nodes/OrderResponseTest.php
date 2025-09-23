<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use DateTimeImmutable;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\SchemaValidationException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\OpenTrans\Nodes\OrderResponse;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Throwable;

class OrderResponseTest extends TestCase
{
    private Serializer $serializer;

    protected function setUp(): void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @param string $file
     * @param array<string, mixed> $data
     * @throws InvalidSetterException
     * @throws SchemaValidationException
     * @throws UnknownKeyException
     */
    #[DataProvider('provideOrderResponseData')]
    public function testOrderResponse(string $file, array $data): void
    {
        $node = NodeBuilder::fromArray($data, NodeBuilder::fromArray([], OrderResponse::class));
        try {
            $xml = $this->serializer->serialize($node, 'xml');
        } catch (Throwable $throwable) {
            $this->fail($throwable->getMessage());
        }

        $this->assertEquals(file_get_contents($file), $xml);
        $this->assertTrue(SchemaValidator::isValid($xml, '2.1'));
    }

    /**
     * @return array<string, mixed>[]
     */
    public static function provideOrderResponseData(): array
    {
        return [
            [
                'file' => __DIR__ . '/../assets/minimal_valid_orderresponse.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'orderResponseDate' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'sequenceId' => 1,
                            'parties' => [
                                [
                                    'id' => [
                                        'value' => 'org.de.supplier',
                                        'type' => 'supplier',
                                    ],
                                ],
                                [
                                    'id' => [
                                        'value' => 'org.de.buyer',
                                        'type' => 'buyer',
                                    ],
                                ],
                            ],
                            'partiesReference' => [
                                'buyerIdRef' => [
                                    'value' => 'org.de.buyer',
                                ],
                                'supplierIdRef' => [
                                    'value' => 'org.de.buyer',
                                ],
                            ],
                        ],
                    ],
                    'items' => [
                        [
                            'lineItemId' => 'line-item-id-1',
                            'productId' => [
                                'supplierPid' => [
                                    'value' => 'product-number-1',
                                ],
                            ],
                            'quantity' => 5,
                            'orderUnit' => 'C62',
                        ],
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ],
                ],
            ],
            [
                'file' => __DIR__ . '/../assets/minimal_valid_orderresponse_with_shipment_parties_reference.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'orderResponseDate' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'sequenceId' => 1,
                            'parties' => [
                                [
                                    'id' => [
                                        'value' => 'org.de.supplier',
                                        'type' => 'supplier',
                                    ],
                                ],
                                [
                                    'id' => [
                                        'value' => 'org.de.buyer',
                                        'type' => 'buyer',
                                    ],
                                ],
                                [
                                    'id' => [
                                        'value' => 'org.de.delivery',
                                    ],
                                ],
                            ],
                            'partiesReference' => [
                                'buyerIdRef' => [
                                    'value' => 'org.de.buyer',
                                ],
                                'supplierIdRef' => [
                                    'value' => 'org.de.buyer',
                                ],
                            ],
                        ],
                    ],
                    'items' => [
                        [
                            'lineItemId' => 'line-item-id-1',
                            'productId' => [
                                'supplierPid' => [
                                    'value' => 'product-number-1',
                                ],
                            ],
                            'quantity' => 5,
                            'orderUnit' => 'C62',
                            'priceFix' => [
                                'amount' => 100,
                            ],
                            'priceLineAmount' => 500,
                            'shipmentPartiesReference' => [
                                'deliveryIdRef' => [
                                    'value' => 'org.de.delivery',
                                ],
                                'finalDeliveryIdRef' => [
                                    'value' => 'org.de.final.delivery',
                                ],
                                'delivererIdRef' => [
                                    'value' => 'org.de.deliverer',
                                ],
                            ],
                        ],
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ],
                ],
            ],
        ];
    }
}
