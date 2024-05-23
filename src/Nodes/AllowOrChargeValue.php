<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class AllowOrChargeValue implements NodeInterface
{
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
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\AocOrderUnitsCount::class)]
    #[Serializer\SerializedName('AOC_ORDER_UNITS_COUNT')]
    protected \Naugrim\OpenTrans\Nodes\AocOrderUnitsCount $orderUnitsCount;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('AOC_ADDITIONAL_ITEMS')]
    protected string $additionalItems;

    /**
     * @return float
     */
    public function getPercentageFactor(): float
    {
        return $this->percentageFactor;
    }

    /**
     * @param float $percentageFactor
     * @return AllowOrChargeValue
     */
    public function setPercentageFactor(float $percentageFactor): AllowOrChargeValue
    {
        $this->percentageFactor = $percentageFactor;
        return $this;
    }

    /**
     * @return float
     */
    public function getMonetaryAmount(): float
    {
        return $this->monetaryAmount;
    }

    /**
     * @param float $monetaryAmount
     * @return AllowOrChargeValue
     */
    public function setMonetaryAmount(float $monetaryAmount): AllowOrChargeValue
    {
        $this->monetaryAmount = $monetaryAmount;
        return $this;
    }

    /**
     * @return AocOrderUnitsCount
     */
    public function getOrderUnitsCount(): AocOrderUnitsCount
    {
        return $this->orderUnitsCount;
    }

    /**
     * @param AocOrderUnitsCount $orderUnitsCount
     * @return AllowOrChargeValue
     */
    public function setOrderUnitsCount(AocOrderUnitsCount $orderUnitsCount): AllowOrChargeValue
    {
        $this->orderUnitsCount = $orderUnitsCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalItems(): string
    {
        return $this->additionalItems;
    }

    /**
     * @param string $additionalItems
     * @return AllowOrChargeValue
     */
    public function setAdditionalItems(string $additionalItems): AllowOrChargeValue
    {
        $this->additionalItems = $additionalItems;
        return $this;
    }
}
