<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\SourcingInfo;

trait HasSourcingInfo
{
    /**
     *
     * @var SourcingInfo
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\SourcingInfo::class)]
    #[Serializer\SerializedName('SOURCING_INFO')]
    protected SourcingInfo $sourcingInfo;
}
