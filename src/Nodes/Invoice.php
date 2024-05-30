<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\Invoice\Header;
use Naugrim\OpenTrans\Nodes\Invoice\Item;
use Naugrim\OpenTrans\Nodes\Invoice\Summary;

#[Serializer\XmlRoot('INVOICE')]
#[Serializer\ExclusionPolicy('all')]
class Invoice implements NodeInterface
{
    use HasSerializableAttributes;
    use IsRootNode;

    /**
     *
     * @var Header
     */
    #[Serializer\Expose]
    #[Serializer\Type(Header::class)]
    #[Serializer\SerializedName('INVOICE_HEADER')]
    protected Header $header;

    /**
     *
     *
     * @var Item[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('INVOICE_ITEM_LIST')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Invoice\Item>')]
    #[Serializer\XmlList(entry: 'INVOICE_ITEM')]
    protected array $items = [];

    /**
     *
     * @var Summary
     */
    #[Serializer\Expose]
    #[Serializer\Type(Summary::class)]
    #[Serializer\SerializedName('INVOICE_SUMMARY')]
    protected Summary $summary;

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): Invoice
    {
        $this->items[] = $item;
        return $this;
    }
}
