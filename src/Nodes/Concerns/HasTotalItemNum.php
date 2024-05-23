<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasTotalItemNum
{
    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("TOTAL_ITEM_NUM")
     * @Serializer\Type("int")
     *
     * @var int
     */
    protected int $totalItemNum;

    /**
     * @return int
     */
    public function getTotalItemNum(): int
    {
        return $this->totalItemNum;
    }

    /**
     * @param int $totalItemNum
     * @return NodeInterface
     */
    public function setTotalItemNum(int $totalItemNum): NodeInterface
    {
        $this->totalItemNum = $totalItemNum;
        /** @var NodeInterface $this */
        return $this;
    }
}
