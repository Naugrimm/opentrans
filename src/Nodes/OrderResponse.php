<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\OrderResponse\Header;
use Naugrim\OpenTrans\Nodes\OrderResponse\Item;
use Naugrim\OpenTrans\Nodes\OrderResponse\Summary;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<OrderResponse>
 * @method self setHeader(array|\Naugrim\OpenTrans\Nodes\OrderResponse\Header $header)
 * @method \Naugrim\OpenTrans\Nodes\OrderResponse\Header getHeader()
 * @method self setItems(\Naugrim\OpenTrans\Nodes\OrderResponse\Item|array $items)
 * @method Naugrim\OpenTrans\Nodes\OrderResponse\Item[] getItems()
 * @method self setSummary(array|\Naugrim\OpenTrans\Nodes\OrderResponse\Summary $summary)
 * @method \Naugrim\OpenTrans\Nodes\OrderResponse\Summary getSummary()
 */
#[Serializer\XmlRoot('ORDERRESPONSE')]
#[Serializer\ExclusionPolicy('all')]
#[Serializer\XmlNamespace(uri: OpenTrans::BMECAT_NAMESPACE, prefix: 'bme')]
#[Serializer\XmlNamespace(uri: OpenTrans::OPENTRANS_NAMESPACE)]
class OrderResponse implements NodeInterface
{
    use HasSerializableAttributes;
    use IsRootNode;

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

    #[Serializer\Expose]
    #[Serializer\Type(Summary::class)]
    #[Serializer\SerializedName('ORDERRESPONSE_SUMMARY')]
    protected Summary $summary;

    /**
     * @return $this
     */
    public function addItem(Item $item): OrderResponse
    {
        $this->items[] = $item;
        return $this;
    }
}
