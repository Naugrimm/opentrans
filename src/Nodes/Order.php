<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\Order\Header;
use Naugrim\OpenTrans\Nodes\Order\Item;
use Naugrim\OpenTrans\Nodes\Order\Summary;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<Order>
 */
#[Serializer\XmlRoot('ORDER')]
#[Serializer\ExclusionPolicy('all')]
class Order implements NodeInterface
{
    use HasSerializableAttributes;
    use IsRootNode;

    #[Serializer\Expose]
    #[Serializer\XmlAttribute]
    #[Serializer\Type('string')]
    protected string $type = 'standard';

    /**
     *
     * @var Header
     */
    #[Serializer\Expose]
    #[Serializer\Type(Header::class)]
    #[Serializer\SerializedName('ORDER_HEADER')]
    protected Header $header;

    /**
     *
     *
     * @var Item[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('ORDER_ITEM_LIST')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Order\Item>')]
    #[Serializer\XmlList(entry: 'ORDER_ITEM')]
    protected array $items = [];

    /**
     *
     * @var Summary
     */
    #[Serializer\Expose]
    #[Serializer\Type(Summary::class)]
    #[Serializer\SerializedName('ORDER_SUMMARY')]
    protected Summary $summary;

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): Order
    {
        $this->items[] = $item;
        return $this;
    }
}
