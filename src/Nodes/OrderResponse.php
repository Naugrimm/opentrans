<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\OrderResponse\Header;
use Naugrim\OpenTrans\Nodes\OrderResponse\Item;
use Naugrim\OpenTrans\Nodes\OrderResponse\Summary;

/**
 *
 * @Serializer\XmlRoot("ORDERRESPONSE")
 * @Serializer\ExclusionPolicy("all")
 */
class OrderResponse implements NodeInterface
{
    use IsRootNode;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\OrderResponse\Header")
     * @Serializer\SerializedName("ORDERRESPONSE_HEADER")
     *
     * @var Header
     */
    protected $header;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("ORDERRESPONSE_ITEM_LIST")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\OrderResponse\Item>")
     * @Serializer\XmlList(entry = "ORDERRESPONSE_ITEM")
     *
     * @var Item[]
     */
    protected $items = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\OrderResponse\Summary")
     * @Serializer\SerializedName("ORDERRESPONSE_SUMMARY")
     *
     * @var Summary
     */
    protected $summary;

    /**
     * @return Header
     */
    public function getHeader(): Header
    {
        return $this->header;
    }

    /**
     * @param Header $header
     * @return OrderResponse
     */
    public function setHeader(Header $header): OrderResponse
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
     * @return OrderResponse
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setItems(array $items): OrderResponse
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
    public function addItem(Item $item): OrderResponse
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
     * @return OrderResponse
     */
    public function setSummary(Summary $summary): OrderResponse
    {
        $this->summary = $summary;
        return $this;
    }
}
