<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\OrderResponse\Header;
use Naugrim\OpenTrans\Nodes\OrderResponse\Item;
use Naugrim\OpenTrans\Nodes\OrderResponse\Summary;

/**
 * @implements NodeInterface<OrderResponse>
 */
#[Serializer\XmlRoot('ORDERRESPONSE')]
#[Serializer\ExclusionPolicy('all')]
class OrderResponse implements NodeInterface
{
    use HasSerializableAttributes;
    use IsRootNode;

    /**
     *
     * @var Header
     */
    #[Serializer\Expose]
    #[Serializer\Type(Header::class)]
    #[Serializer\SerializedName('ORDERRESPONSE_HEADER')]
    protected Header $header;

    /**
     *
     *
     * @var Item[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('ORDERRESPONSE_ITEM_LIST')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\OrderResponse\Item>')]
    #[Serializer\XmlList(entry: 'ORDERRESPONSE_ITEM')]
    protected array $items = [];

    /**
     *
     * @var Summary
     */
    #[Serializer\Expose]
    #[Serializer\Type(Summary::class)]
    #[Serializer\SerializedName('ORDERRESPONSE_SUMMARY')]
    protected Summary $summary;

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): OrderResponse
    {
        $this->items[] = $item;
        return $this;
    }
}
