<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\Invoice\Header;
use Naugrim\OpenTrans\Nodes\Invoice\Item;
use Naugrim\OpenTrans\Nodes\Invoice\Summary;

/**
 *
 * @Serializer\XmlRoot("INVOICE")
 * @Serializer\ExclusionPolicy("all")
 */
class Invoice implements NodeInterface
{
    use IsRootNode;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Invoice\Header")
     * @Serializer\SerializedName("INVOICE_HEADER")
     *
     * @var Header
     */
    protected $header;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("INVOICE_ITEM_LIST")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Invoice\Item>")
     * @Serializer\XmlList(entry = "INVOICE_ITEM")
     *
     * @var Item[]
     */
    protected $items = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Invoice\Summary")
     * @Serializer\SerializedName("INVOICE_SUMMARY")
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
     * @return Invoice
     */
    public function setHeader(Header $header): Invoice
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
     * @return Invoice
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setItems(array $items): Invoice
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
    public function addItem(Item $item): Invoice
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
     * @return Invoice
     */
    public function setSummary(Summary $summary): Invoice
    {
        $this->summary = $summary;
        return $this;
    }
}
