<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use DateTimeImmutable;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\SchemaValidationException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\OpenTrans\Nodes\DispatchNotification;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Throwable;

class DispatchNotificationTest extends TestCase
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
    #[DataProvider('provideDispatchNotificationData')]
    public function testDispatchNotification(string $file, array $data): void
    {
        $node = NodeBuilder::fromArray($data, NodeBuilder::fromArray([], DispatchNotification::class));
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
    public static function provideDispatchNotificationData(): array
    {
        return [
            [
                'file' => __DIR__ . '/../assets/minimal_valid_dispatchnotification.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'dispatch-id-1',
                            'dispatchNotificationDate' => new DateTimeImmutable('2020-01-27')->format('Y-m-d'),
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
                            'supplierIdRef' => [
                                'value' => 'org.de.supplier',
                            ],
                            'buyerIdRef' => [
                                'value' => 'org.de.buyer',
                            ],
                            'shipmentPartiesReference' => [
                                'deliveryIdRef' => [
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
                            'supplierIdRef' => [
                                'value' => 'org.de.supplier',
                            ],
                            'orderReference' => [
                                'orderId' => 'order-id-1',
                                'lineItemId' => 'line-item-id-1',
                            ],
                            'shipmentPartiesReference' => [
                                'deliveryIdRef' => [
                                    'value' => 'org.de.buyer',
                                ],
                            ],
                        ],
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ],
                ],
            ],
            [
                'file' => __DIR__ . '/../assets/minimal_valid_dispatchnotification_with_delivery_reference.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'dispatch-id-2',
                            'dispatchNotificationDate' => new DateTimeImmutable('2020-01-27')->format('Y-m-d'),
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
                            'supplierIdRef' => [
                                'value' => 'org.de.supplier',
                            ],
                            'buyerIdRef' => [
                                'value' => 'org.de.buyer',
                            ],
                            'shipmentPartiesReference' => [
                                'deliveryIdRef' => [
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
                            'deliveryReference' => [
                                'deliverynoteId' => 'delivery-note-456',
                                'lineItemId' => 'delivery-line-item-2',
                                'deliveryDate' => [
                                    'deliveryStartDate' => new DateTimeImmutable('2020-02-15')->format('Y-m-d'),
                                    'deliveryEndDate' => new DateTimeImmutable('2020-02-15')->format('Y-m-d'),
                                ],
                                'deliveryIdRef' => [
                                    'value' => 'delivery-party-456',
                                    'type' => 'supplier_specific',
                                ],
                            ],
                            'supplierIdRef' => [
                                'value' => 'org.de.supplier',
                            ],
                            'orderReference' => [
                                'orderId' => 'order-id-1',
                                'lineItemId' => 'line-item-id-1',
                            ],
                            'shipmentPartiesReference' => [
                                'deliveryIdRef' => [
                                    'value' => 'org.de.buyer',
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
