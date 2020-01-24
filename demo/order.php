<?php


use Doctrine\Common\Annotations\AnnotationRegistry;
use Naugrim\OpenTrans\Builder\NodeBuilder;
use Naugrim\OpenTrans\Nodes\Order;
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
            'id' => 'order-id-1',
            'date' => (new DateTimeImmutable())->format('Y-m-d'),
            'parties' => [
                [
                    'id' => 'org.de.supplier'
                ],
                [
                    'id' => 'org.de.buyer'
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
], new Order());


$xml = $serializer->serialize($invoice, 'xml');

echo $xml."\n";

SchemaValidator::isValid($xml, '2.1');
