<?php

namespace Naugrim\OpenTrans\Nodes\OrderChange;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;

/**
 * @implements NodeInterface<Header>
 * @method self setInfo(array|\Naugrim\OpenTrans\Nodes\OrderChange\Info $info)
 * @method \Naugrim\OpenTrans\Nodes\OrderChange\Info getInfo()
 */
#[Serializer\AccessorOrder(order: 'custom', custom: ['controlInfo', 'info'])]
class Header implements NodeInterface
{
    use HasSerializableAttributes;
    use HasControlInfo;

    #[Serializer\Expose]
    #[Serializer\Type(Info::class)]
    #[Serializer\SerializedName('ORDERCHANGE_INFO')]
    protected Info $info;
}
