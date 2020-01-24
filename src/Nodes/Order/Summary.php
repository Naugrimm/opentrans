<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\Nodes\NodeInterface;

class Summary implements NodeInterface
{
    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("TOTAL_ITEM_NUM")
     * @Serializer\Type("int")
     *
     * @var int
     */
    protected $totalItemNum;

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
     * @return int
     */
    public function getTotalItemNum(): int
    {
        return $this->totalItemNum;
    }

    /**
     * @param int $totalItemNum
     * @return Summary
     */
    public function setTotalItemNum(int $totalItemNum): Summary
    {
        $this->totalItemNum = $totalItemNum;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    /**
     * @param float $totalAmount
     * @return Summary
     */
    public function setTotalAmount(float $totalAmount): Summary
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }
}
