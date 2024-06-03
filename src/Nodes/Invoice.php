<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\Invoice\Header;
use Naugrim\OpenTrans\Nodes\Invoice\Item;
use Naugrim\OpenTrans\Nodes\Invoice\Summary;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<Invoice>
 */
#[Serializer\XmlRoot('INVOICE')]
#[Serializer\ExclusionPolicy('all')]
#[Serializer\XmlNamespace(uri: OpenTrans::BMECAT_NAMESPACE, prefix: 'bme')]
#[Serializer\XmlNamespace(uri: OpenTrans::OPENTRANS_NAMESPACE)]
class Invoice implements NodeInterface
{
    use HasSerializableAttributes;
    use IsRootNode;

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

    #[Serializer\Expose]
    #[Serializer\Type(Summary::class)]
    #[Serializer\SerializedName('INVOICE_SUMMARY')]
    protected Summary $summary;

    /**
     * @return $this
     */
    public function addItem(Item $item): Invoice
    {
        $this->items[] = $item;
        return $this;
    }
}
