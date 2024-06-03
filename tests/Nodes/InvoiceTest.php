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
use Naugrim\OpenTrans\Nodes\Invoice;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\TestCase;
use Throwable;

class InvoiceTest extends TestCase
{
    private Serializer $serializer;

    protected function setUp(): void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @dataProvider provideInvoiceData
     * @param string $file
     * @param array<string, mixed> $data
     * @throws InvalidSetterException
     * @throws SchemaValidationException
     * @throws UnknownKeyException
     */
    public function testInvoice(string $file, array $data): void
    {
        $node = NodeBuilder::fromArray($data, NodeBuilder::fromArray([], Invoice::class));
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
    public static function provideInvoiceData(): array
    {
        return [
            [
                'file' => __DIR__ . '/../assets/minimal_valid_invoice.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'invoice-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'parties' => [
                                [
                                    'id' => [
                                        'value' => 'org.de.issuer',
                                        'type' => 'issuer',
                                    ],
                                ],
                                [
                                    'id' => [
                                        'value' => 'org.de.rcpt',
                                        'type' => 'buyer',
                                    ],
                                ],
                            ],
                            'issuerIdRef' => [
                                'type' => 'supplier_specific',
                                'value' => 'org.de.issuer',
                            ],
                            'rcptIdRef' => [
                                'type' => 'buyer',
                                'value' => 'org.de.rcpt',
                            ],
                            'currency' => 'EUR',
                        ],
                    ],
                    'items' => [
                        [
                            'lineItemId' => 'line-item-id-1',
                            'productId' => [],
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                            'priceFix' => [
                                'amount' => 123,
                            ],
                            'priceLineAmount' => 10 * 123,
                        ],
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                        'netValueGoods' => 10 * 123,
                        'totalAmount' => (10 * 123) * 1.19,
                        'totalTax' => [
                            [
                                'amount' => (10 * 123) * 0.19,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'file' => __DIR__ . '/../assets/minimal_valid_invoice_with_delivery_date.xml',
                'data' => [
                    'header' => [
                        'info' => [
                            'id' => 'invoice-id-1',
                            'date' => (new DateTimeImmutable('2020-01-27'))->format('Y-m-d'),
                            'deliveryDate' => [
                                'deliveryStartDate' => (new DateTimeImmutable('2020-02-27'))->format('Y-m-d'),
                                'deliveryEndDate' => (new DateTimeImmutable('2020-02-27'))->format('Y-m-d'),
                            ],
                            'parties' => [
                                [
                                    'id' => [
                                        'value' => 'org.de.issuer',
                                        'type' => 'issuer',
                                    ],
                                ],
                                [
                                    'id' => [
                                        'value' => 'org.de.rcpt',
                                        'type' => 'buyer',
                                    ],
                                ],
                            ],
                            'issuerIdRef' => [
                                'type' => 'supplier_specific',
                                'value' => 'org.de.issuer'
                            ],
                            'rcptIdRef' => [
                                'value' => 'org.de.rcpt',
                                'type' => 'buyer',
                            ],
                            'currency' => 'EUR',
                        ],
                    ],
                    'items' => [
                        [
                            'lineItemId' => 'line-item-id-1',
                            'productId' => [],
                            'quantity' => 10,
                            'orderUnit' => 'C62',
                            'priceFix' => [
                                'amount' => 123,
                            ],
                            'priceLineAmount' => 10 * 123,
                        ],
                    ],
                    'summary' => [
                        'totalItemNum' => 1,
                        'netValueGoods' => 10 * 123,
                        'totalAmount' => (10 * 123) * 1.19,
                        'totalTax' => [
                            [
                                'amount' => (10 * 123) * 0.19,
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
