<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\Order\Item;
use Naugrim\OpenTrans\Nodes\Order\Summary;
use Naugrim\OpenTrans\Nodes\OrderChange\Header;

/**
 * @implements NodeInterface<OrderChange>
 */
#[Serializer\XmlRoot('ORDERCHANGE')]
#[Serializer\ExclusionPolicy('all')]
class OrderChange implements NodeInterface
{
    use HasSerializableAttributes;
    use IsRootNode;

    /**
     *
     * @var Header
     */
    #[Serializer\Expose]
    #[Serializer\Type(Header::class)]
    #[Serializer\SerializedName('ORDERCHANGE_HEADER')]
    protected Header $header;

    /**
     *
     *
     * @var Item[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('ORDERCHANGE_ITEM_LIST')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Order\Item>')]
    #[Serializer\XmlList(entry: 'ORDER_ITEM')]
    protected array $items = [];

    /**
     *
     * @var Summary
     */
    #[Serializer\Expose]
    #[Serializer\Type(Summary::class)]
    #[Serializer\SerializedName('ORDERCHANGE_SUMMARY')]
    protected Summary $summary;

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): OrderChange
    {
        $this->items[] = $item;
        return $this;
    }
}
