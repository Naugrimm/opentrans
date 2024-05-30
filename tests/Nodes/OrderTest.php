<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use DateTime;
use DateTimeImmutable;
use JMS\Serializer\SerializerInterface;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\OpenTrans\Nodes\Order;
use Naugrim\OpenTrans\Nodes\Udx;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\TestCase;
use \JMS\Serializer\SerializerBuilder;

class OrderTest extends TestCase
{
    /**
     * @var SerializerInterface
     */
    private \JMS\Serializer\Serializer $serializer;

    protected function setUp(): void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @dataProvider provideOrderData
     */
    public function testOrder(string $file, array $data): void
    {
        $node = NodeBuilder::fromArray($data, new Order());
        try {
            $xml = $this->serializer->serialize($node, 'xml');
        } catch (\Throwable $throwable) {
            $this->fail($throwable->getMessage());
        }

        $this->assertEquals(file_get_contents($file), $xml);
        $this->assertTrue(SchemaValidator::isValid($xml, '2.1'));
    }

    public static function provideOrderData(): array
    {
        return [
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_delivery_date_in_order_item.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['value' => 'org.de.supplier']
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                            'deliveryDate' => [
                                'deliveryStartDate' => (new DateTimeImmutable('2020-02-27'))->format('Y-m-d'),
                                'deliveryEndDate' => (new DateTimeImmutable('2020-02-27'))->format('Y-m-d'),
                            ],
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_delivery_date.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'deliveryDate' => [
                                'deliveryStartDate' => (new DateTimeImmutable('2020-02-27'))->format('Y-m-d'),
                                'deliveryEndDate' => (new DateTimeImmutable('2020-02-27'))->format('Y-m-d'),
                            ],
                            'parties' => [
                                [
                                    'id' => ['value' => 'org.de.supplier']
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_contactdetails.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['type' => 'supplier_specific', 'value' => 'supplier ID'],
                                    'role' => ['role' => 'supplier']
                                ],
                                [
                                    'id' => ['value' => 'org.de.buyer', 'type' => 'buyer'],
                                    'address' => [
                                        'name' => 'Test Example',
                                        'contactDetails' => [
                                            'name' => 'Example',
                                            'firstName' => 'Test',
                                            'emails' => [
                                                'email' => 'test@example.com'
                                            ],
                                        ],
                                        'street' => 'Testweg',
                                        'zip' => '42',
                                        'city' => 'Springfield',
                                        'country' => 'DE',
                                        'email' => 'test@example.com',
                                    ]
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_udx.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['type' => 'supplier_specific', 'value' => 'supplier ID'],
                                    'role' => ['role' => 'supplier']
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                            'udxItems' => [
                                [
                                    'vendor' => 'acme',
                                    'name' => 'abc',
                                    'value' => '123',
                                ],
                                (new Udx())->setValue('sfoo')->setName('bar')->setVendor('company')
                            ]
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_udx_header.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['type' => 'supplier_specific', 'value' => 'supplier ID'],
                                    'role' => ['role' => 'supplier']
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
                            ],
                            'udxItems' => [
                                [
                                    'vendor' => 'acme',
                                    'name' => 'abc',
                                    'value' => '123',
                                ],
                                (new Udx())->setValue('sfoo')->setName('bar')->setVendor('company')
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_address.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['value' => 'org.de.supplier']
                                ],
                                [
                                    'id' => ['value' => 'org.de.buyer', 'type' => 'buyer'],
                                    'address' => [
                                        'name' => 'Someone',
                                        'name2' => 'Else',
                                        'zip' => '98765',
                                        'street' => 'Some street',
                                        'city' => 'Somewhere',
                                        'country' => 'Germany',
                                        'countryCoded' => 'DE',
                                        'contactDetails' => [
                                            'id' => '1234-098765',
                                            'firstName' => 'John',
                                            'name' => 'Doe',
                                            'title' => 'Miss',
                                            'academicTitle' => 'Dr',
                                            'phone' => [
                                                'value' => '+49 321 654987',
                                                'type' => 'mobile'
                                            ]
                                        ],
                                        'phone' => [
                                            'value' => '+49 123 456789 - 0'
                                        ]
                                    ]
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_payment_account.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['value' => 'org.de.supplier']
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
                            ],
                            'payment' => [
                                'accounts' => [
                                    [
                                        'bankAccount' => [
                                            'type' => 'iban',
                                            'value' => 'DE12345678900000'
                                        ],
                                        'bankCode' => [
                                            'type' => 'bic',
                                            'value' => 'ABCDEF00',
                                        ],
                                        'holder' => 'me',
                                        'bankCountry' => 'DE',
                                        'bankName' => 'Testbank',
                                    ]
                                ]
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_payment_card_amex.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['value' => 'org.de.supplier']
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
                            ],
                            'payment' => [
                                'card' => [
                                    'type' => 'AmericanExpress',
                                    'number' => '123456789',
                                    'holder' => 'me',
                                    'expDate' => new DateTime('2025-01'),
                                ]
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_payment_debit.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['value' => 'org.de.supplier']
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
                            ],
                            'payment' => [
                                'debit' => true
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_payment_cash.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['value' => 'org.de.supplier']
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
                            ],
                            'payment' => [
                                'cash' => true
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order_with_payment_check.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['value' => 'org.de.supplier']
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
                            ],
                            'payment' => [
                                'check' => true
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ],
            [
                'file' => __DIR__.'/../assets/minimal_valid_order.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'order-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => ['value' => 'org.de.supplier']
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
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                        ]
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                    ]
                ]
            ]
        ];
    }
}
