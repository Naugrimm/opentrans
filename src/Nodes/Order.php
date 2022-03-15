<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\Order\Header;
use Naugrim\OpenTrans\Nodes\Order\Item;
use Naugrim\OpenTrans\Nodes\Order\Summary;

/**
 *
 * @Serializer\XmlRoot("ORDER")
 * @Serializer\ExclusionPolicy("all")
 */
class Order implements NodeInterface
{
    use IsRootNode;

    /**
     * @Serializer\Expose
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected $type = 'standard';

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\Header")
     * @Serializer\SerializedName("ORDER_HEADER")
     *
     * @var Header
     */
    protected $header;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("ORDER_ITEM_LIST")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Order\Item>")
     * @Serializer\XmlList(entry = "ORDER_ITEM")
     *
     * @var Item[]
     */
    protected $items = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\Summary")
     * @Serializer\SerializedName("ORDER_SUMMARY")
     *
     * @var Summary
     */
    protected $summary;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Order
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Header
     */
    public function getHeader(): Header
    {
        return $this->header;
    }

    /**
     * @param Header $header
     * @return Order
     */
    public function setHeader(Header $header): Order
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
     * @return Order
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setItems(array $items): Order
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
    public function addItem(Item $item): Order
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
     * @return Order
     */
    public function setSummary(Summary $summary): Order
    {
        $this->summary = $summary;
        return $this;
    }
}
