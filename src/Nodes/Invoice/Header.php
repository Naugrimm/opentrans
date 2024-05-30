<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;
use Naugrim\OpenTrans\Nodes\Order\History;

#[Serializer\AccessorOrder(order: 'custom', custom: ['controlInfo', 'info', 'orderHistory'])]
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
    #[Serializer\SerializedName('INVOICE_INFO')]
    protected Info $info;

    /**
     *
     * @var History
     */
    #[Serializer\Expose]
    #[Serializer\Type(History::class)]
    #[Serializer\SerializedName('ORDER_HISTORY')]
    protected History $orderHistory;
}
