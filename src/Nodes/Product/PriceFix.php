<?php

namespace Naugrim\OpenTrans\Nodes\Product;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class PriceFix implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("bme:PRICE_AMOUNT")
     *
     * @var float
     */
    protected $amount;

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return PriceFix
     */
    public function setAmount(float $amount): PriceFix
    {
        $this->amount = $amount;
        return $this;
    }
}
