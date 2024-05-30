<?php

namespace Naugrim\OpenTrans\Nodes\OrderChange;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;

#[Serializer\AccessorOrder(order: 'custom', custom: ['controlInfo', 'info'])]
class Header implements NodeInterface
{
    use \Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
    use HasControlInfo;

    /**
     *
     * @var Info
     */
    #[Serializer\Expose]
    #[Serializer\Type(Info::class)]
    #[Serializer\SerializedName('ORDERCHANGE_INFO')]
    protected Info $info;
}
