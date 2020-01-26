<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use Naugrim\OpenTrans\Nodes\NodeInterface;
use Naugrim\OpenTrans\Nodes\SourcingInfo;

trait HasSourcingInfo
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\SourcingInfo")
     * @Serializer\SerializedName("SOURCING_INFO")
     *
     * @var SourcingInfo
     */
    protected $sourcingInfo;

    /**
     * @return SourcingInfo
     */
    public function getSourcingInfo(): SourcingInfo
    {
        return $this->sourcingInfo;
    }

    /**
     * @param SourcingInfo $sourcingInfo
     * @return NodeInterface
     */
    public function setSourcingInfo(SourcingInfo $sourcingInfo): NodeInterface
    {
        $this->sourcingInfo = $sourcingInfo;
        /** @var NodeInterface $this */
        return $this;
    }
}
