<?php


use Doctrine\Common\Annotations\AnnotationRegistry;
use Naugrim\OpenTrans\Builder\NodeBuilder;
use Naugrim\OpenTrans\Nodes\Invoice;
use Naugrim\OpenTrans\SchemaValidator;

call_user_func(function () {
    if (! is_file($autoloadFile = __DIR__.'/../vendor/autoload.php')) {
        throw new RuntimeException('Did not find vendor/autoload.php. Did you run "composer install --dev"?');
    }

    require $autoloadFile;
    AnnotationRegistry::registerLoader('class_exists');
});


$serializer = JMS\Serializer\SerializerBuilder::create()->build();

$invoice = NodeBuilder::fromArray([
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


$xml = $serializer->serialize($invoice, 'xml');

echo $xml."\n";

SchemaValidator::isValid($xml, '2.1');
