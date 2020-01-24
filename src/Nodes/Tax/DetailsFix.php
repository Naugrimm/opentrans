<?php

namespace Naugrim\OpenTrans\Nodes\Tax;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\Nodes\NodeInterface;

class DetailsFix implements NodeInterface
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
     * @return DetailsFix
     */
    public function setAmount(float $amount): DetailsFix
    {
        $this->amount = $amount;
        return $this;
    }
}
