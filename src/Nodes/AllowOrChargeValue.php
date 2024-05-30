<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<AllowOrChargeValue>
 */
class AllowOrChargeValue implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     *
     * @var float
     */
    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('AOC_PERCENTAGE_FACTOR')]
    protected float $percentageFactor;

    /**
     *
     * @var float
     */
    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('AOC_MONETARY_AMOUNT')]
    protected float $monetaryAmount;

    /**
     *
     * @var AocOrderUnitsCount
     */
    #[Serializer\Expose]
    #[Serializer\Type(AocOrderUnitsCount::class)]
    #[Serializer\SerializedName('AOC_ORDER_UNITS_COUNT')]
    protected AocOrderUnitsCount $orderUnitsCount;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('AOC_ADDITIONAL_ITEMS')]
    protected string $additionalItems;
}
