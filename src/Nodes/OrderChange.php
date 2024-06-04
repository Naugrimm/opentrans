<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\Order\Item;
use Naugrim\OpenTrans\Nodes\Order\Summary;
use Naugrim\OpenTrans\Nodes\OrderChange\Header;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<OrderChange>
 * @method self setHeader(array|\Naugrim\OpenTrans\Nodes\OrderChange\Header $header)
 * @method \Naugrim\OpenTrans\Nodes\OrderChange\Header getHeader()
 * @method self setItems(\Naugrim\OpenTrans\Nodes\Order\Item|array $items)
 * @method Naugrim\OpenTrans\Nodes\Order\Item[] getItems()
 * @method self setSummary(array|\Naugrim\OpenTrans\Nodes\Order\Summary $summary)
 * @method \Naugrim\OpenTrans\Nodes\Order\Summary getSummary()
 */
#[Serializer\XmlRoot('ORDERCHANGE')]
#[Serializer\ExclusionPolicy('all')]
#[Serializer\XmlNamespace(uri: OpenTrans::BMECAT_NAMESPACE, prefix: 'bme')]
#[Serializer\XmlNamespace(uri: OpenTrans::OPENTRANS_NAMESPACE)]
class OrderChange implements NodeInterface
{
    use HasSerializableAttributes;
    use IsRootNode;

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

    #[Serializer\Expose]
    #[Serializer\Type(Summary::class)]
    #[Serializer\SerializedName('ORDERCHANGE_SUMMARY')]
    protected Summary $summary;

    /**
     * @return $this
     */
    public function addItem(Item $item): OrderChange
    {
        $this->items[] = $item;
        return $this;
    }
}
