<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasTotalAmount
{
    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("TOTAL_AMOUNT")
     * @Serializer\Type("float")
     *
     * @var float
     */
    protected $totalAmount;

    /**
     * @return float
     */
    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    /**
     * @param float $totalAmount
     * @return NodeInterface
     */
    public function setTotalAmount(float $totalAmount): NodeInterface
    {
        $this->totalAmount = $totalAmount;
        /** @var NodeInterface $this */
        return $this;
    }
}
