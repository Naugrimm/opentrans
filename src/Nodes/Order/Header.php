<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;
use Naugrim\OpenTrans\Nodes\Concerns\HasSourcingInfo;

/**
 * @implements NodeInterface<Header>
 */
#[Serializer\AccessorOrder(order: 'custom', custom: ['controlInfo', 'sourcingInfo', 'info'])]
class Header implements NodeInterface
{
    use HasSerializableAttributes;
    use HasControlInfo;
    use HasSourcingInfo;

    /**
     *
     * @var Info
     */
    #[Serializer\Expose]
    #[Serializer\Type(Info::class)]
    #[Serializer\SerializedName('ORDER_INFO')]
    protected Info $info;
}
