<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;
use Naugrim\OpenTrans\Nodes\Concerns\HasSourcingInfo;

/**
 * @implements NodeInterface<Header>
 * @method self setInfo(array|\Naugrim\OpenTrans\Nodes\Order\Info $info)
 * @method \Naugrim\OpenTrans\Nodes\Order\Info getInfo()
 */
#[Serializer\AccessorOrder(order: 'custom', custom: ['controlInfo', 'sourcingInfo', 'info'])]
class Header implements NodeInterface
{
    use HasSerializableAttributes;
    use HasControlInfo;
    use HasSourcingInfo;

    #[Serializer\Expose]
    #[Serializer\Type(Info::class)]
    #[Serializer\SerializedName('ORDER_INFO')]
    protected Info $info;
}
