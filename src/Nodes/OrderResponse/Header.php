<?php

namespace Naugrim\OpenTrans\Nodes\OrderResponse;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;

/**
 * @implements NodeInterface<Header>
 * @method self setControlInfo(array|\Naugrim\OpenTrans\Nodes\ControlInfo $controlInfo)
 * @method \Naugrim\OpenTrans\Nodes\ControlInfo getControlInfo()
 * @method self setInfo(array|\Naugrim\OpenTrans\Nodes\OrderResponse\Info $info)
 * @method \Naugrim\OpenTrans\Nodes\OrderResponse\Info getInfo()
 */
#[Serializer\AccessorOrder(order: 'custom', custom: ['controlInfo', 'info'])]
class Header implements NodeInterface
{
    use HasSerializableAttributes;
    use HasControlInfo;

    #[Serializer\Expose]
    #[Serializer\Type(Info::class)]
    #[Serializer\SerializedName('ORDERRESPONSE_INFO')]
    protected Info $info;
}
