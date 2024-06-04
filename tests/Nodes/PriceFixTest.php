<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use DateTimeImmutable;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\SchemaValidationException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\OpenTrans\Nodes\Invoice;
use Naugrim\OpenTrans\Nodes\Product\PriceFix;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\TestCase;
use Throwable;

class PriceFixTest extends TestCase
{
    public function testFinalPriceCalculationWithoutTax(): void
    {
        $node = NodeBuilder::fromArray([
            'amount' => 100.0,
        ], PriceFix::class);

        $this->assertEquals(100.0, $node->finalPriceIncludingTaxes());
    }

    public function testFinalPriceCalculationWithTaxAmount(): void
    {
        $node = NodeBuilder::fromArray([
            'amount' => 100.0,
            'tax' => [
                ['amount' => 12]
            ]
        ], PriceFix::class);

        $this->assertEquals(112.0, $node->finalPriceIncludingTaxes());
    }

    public function testFinalPriceCalculationWithTaxPercentage(): void
    {
        $node = NodeBuilder::fromArray([
            'amount' => 100.0,
            'tax' => [
                ['tax' => 0.19]
            ]
        ], PriceFix::class);

        $this->assertEquals(119.0, $node->finalPriceIncludingTaxes());
    }

    public function testFinalPriceCalculationPreferTaxAmount(): void
    {
        $node = NodeBuilder::fromArray([
            'amount' => 100.0,
            'tax' => [
                ['tax' => 0.19, 'amount' => 25]
            ]
        ], PriceFix::class);

        $this->assertEquals(125.0, $node->finalPriceIncludingTaxes());
    }

    public function testFinalPriceCalculationWithCalculationSequence(): void
    {
        $node = NodeBuilder::fromArray([
            'amount' => 100.0,
            'tax' => [
                ['tax' => 0.5, 'calculationSequence' => 2],
                ['amount' => 25],
                ['amount' => 50],
            ]
        ], PriceFix::class);

        $this->assertEquals(262.5, $node->finalPriceIncludingTaxes());
    }
}
