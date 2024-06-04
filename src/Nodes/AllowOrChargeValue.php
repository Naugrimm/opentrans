<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<AllowOrChargeValue>
 * @method self setPercentageFactor(float $percentageFactor)
 * @method float getPercentageFactor()
 * @method self setMonetaryAmount(float $monetaryAmount)
 * @method float getMonetaryAmount()
 * @method self setOrderUnitsCount(array|\Naugrim\OpenTrans\Nodes\AocOrderUnitsCount $orderUnitsCount)
 * @method \Naugrim\OpenTrans\Nodes\AocOrderUnitsCount getOrderUnitsCount()
 * @method self setAdditionalItems(string $additionalItems)
 * @method string getAdditionalItems()
 */
class AllowOrChargeValue implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('AOC_PERCENTAGE_FACTOR')]
    protected float $percentageFactor;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('AOC_MONETARY_AMOUNT')]
    protected float $monetaryAmount;

    #[Serializer\Expose]
    #[Serializer\Type(AocOrderUnitsCount::class)]
    #[Serializer\SerializedName('AOC_ORDER_UNITS_COUNT')]
    protected AocOrderUnitsCount $orderUnitsCount;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('AOC_ADDITIONAL_ITEMS')]
    protected string $additionalItems;
}
