<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\DispatchNotification\Header;
use Naugrim\OpenTrans\Nodes\DispatchNotification\Item;
use Naugrim\OpenTrans\Nodes\DispatchNotification\Summary;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<DispatchNotification>
 * @method self setVersion(string $version)
 * @method string getVersion()
 * @method self setHeader(array|\Naugrim\OpenTrans\Nodes\DispatchNotification\Header $header)
 * @method \Naugrim\OpenTrans\Nodes\DispatchNotification\Header getHeader()
 * @method self setItems(\Naugrim\OpenTrans\Nodes\DispatchNotification\Item[]|array $items)
 * @method \Naugrim\OpenTrans\Nodes\DispatchNotification\Item[]|array getItems()
 * @method self setSummary(array|\Naugrim\OpenTrans\Nodes\DispatchNotification\Summary $summary)
 * @method \Naugrim\OpenTrans\Nodes\DispatchNotification\Summary getSummary()
 */
#[Serializer\XmlRoot('DISPATCHNOTIFICATION')]
#[Serializer\ExclusionPolicy('all')]
#[Serializer\XmlNamespace(uri: OpenTrans::BMECAT_NAMESPACE, prefix: 'bme')]
#[Serializer\XmlNamespace(uri: OpenTrans::OPENTRANS_NAMESPACE)]
class DispatchNotification implements NodeInterface
{
    use HasSerializableAttributes;
    use IsRootNode;

    #[Serializer\Expose]
    #[Serializer\Type(Header::class)]
    #[Serializer\SerializedName('DISPATCHNOTIFICATION_HEADER')]
    protected Header $header;

    /**
     *
     *
     * @var Item[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('DISPATCHNOTIFICATION_ITEM_LIST')]
    #[Serializer\Type('array<' . Item::class . '>')]
    #[Serializer\XmlList(entry: 'DISPATCHNOTIFICATION_ITEM')]
    protected array $items = [];

    #[Serializer\Expose]
    #[Serializer\Type(Summary::class)]
    #[Serializer\SerializedName('DISPATCHNOTIFICATION_SUMMARY')]
    protected Summary $summary;

    /**
     * @return $this
     */
    public function addItem(Item $item): DispatchNotification
    {
        $this->items[] = $item;
        return $this;
    }
}
