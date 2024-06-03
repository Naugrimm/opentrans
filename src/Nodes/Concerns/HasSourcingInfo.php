<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\Nodes\SourcingInfo;

trait HasSourcingInfo
{
    #[Serializer\Expose]
    #[Serializer\Type(SourcingInfo::class)]
    #[Serializer\SerializedName('SOURCING_INFO')]
    protected SourcingInfo $sourcingInfo;
}
