<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\Order\Item;
use Naugrim\OpenTrans\Nodes\Order\Summary;
use Naugrim\OpenTrans\Nodes\OrderChange\Header;

#[Serializer\XmlRoot('ORDERCHANGE')]
#[Serializer\ExclusionPolicy('all')]
class OrderChange implements NodeInterface
{
    use IsRootNode;

    /**
     *
     * @var Header
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\OrderChange\Header::class)]
    #[Serializer\SerializedName('ORDERCHANGE_HEADER')]
    protected \Naugrim\OpenTrans\Nodes\OrderChange\Header $header;

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
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\Order\Summary::class)]
    #[Serializer\SerializedName('ORDERCHANGE_SUMMARY')]
    protected \Naugrim\OpenTrans\Nodes\Order\Summary $summary;

    /**
     * @return Header
     */
    public function getHeader(): Header
    {
        return $this->header;
    }

    /**
     * @param Header $header
     * @return OrderChange
     */
    public function setHeader(Header $header): OrderChange
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     * @return OrderChange
     */
    public function setItems(array $items): OrderChange
    {
        foreach ($items as $item) {
            if (!$item instanceof Item) {
                $item = NodeBuilder::fromArray($item, new Item());
            }

            $this->addItem($item);
        }

        return $this;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): OrderChange
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @return Summary
     */
    public function getSummary(): Summary
    {
        return $this->summary;
    }

    /**
     * @param Summary $summary
     * @return OrderChange
     */
    public function setSummary(Summary $summary): OrderChange
    {
        $this->summary = $summary;
        return $this;
    }
}
