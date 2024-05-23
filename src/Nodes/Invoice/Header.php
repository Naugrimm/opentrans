<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;
use Naugrim\OpenTrans\Nodes\Order\History;

#[Serializer\AccessorOrder(order: 'custom', custom: ['controlInfo', 'info', 'orderHistory'])]
class Header implements NodeInterface
{
    use HasControlInfo;

    /**
     *
     * @var Info
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\Invoice\Info::class)]
    #[Serializer\SerializedName('INVOICE_INFO')]
    protected $info;

    /**
     *
     * @var History
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\Order\History::class)]
    #[Serializer\SerializedName('ORDER_HISTORY')]
    protected $orderHistory;

    /**
     * @return Info
     */
    public function getInfo(): Info
    {
        return $this->info;
    }

    /**
     * @param Info $info
     * @return Header
     */
    public function setInfo(Info $info): Header
    {
        $this->info = $info;
        return $this;
    }

    /**
     * @return History
     */
    public function getOrderHistory(): History
    {
        return $this->orderHistory;
    }

    /**
     * @param History $orderHistory
     * @return Header
     */
    public function setOrderHistory(History $orderHistory): Header
    {
        $this->orderHistory = $orderHistory;
        return $this;
    }
}
