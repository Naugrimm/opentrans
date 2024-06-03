<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasSourcingInfo;
use Naugrim\OpenTrans\Nodes\Concerns\HasUdxItems;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\Product\PriceFix;
use Naugrim\OpenTrans\Nodes\Product\ProductComponent;
use Naugrim\OpenTrans\Nodes\ProductId;
use Naugrim\OpenTrans\Nodes\Remarks;
use Naugrim\OpenTrans\Nodes\Udx;
use Naugrim\OpenTrans\Nodes\UdxInterface;

/**
 * @implements NodeInterface<Item>
 */
#[Serializer\AccessorOrder(order: 'custom', custom: ['lineItemId', 'productId', 'productComponents', 'quantity', 'orderUnit', 'priceFix', 'priceLineAmount', 'deliveryDate', 'partialShipmentAllowed', 'sourcingInfo', 'remarks', 'itemUdx'])]
class Item implements NodeInterface
{
    use HasSerializableAttributes;
    use HasUdxItems;
    use HasSourcingInfo;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LINE_ITEM_ID')]
    protected string $lineItemId;

    #[Serializer\Expose]
    #[Serializer\Type(ProductId::class)]
    #[Serializer\SerializedName('PRODUCT_ID')]
    protected ProductId $productId;

    /**
     * @var ProductComponent[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . ProductComponent::class . '>')]
    #[Serializer\SerializedName('PRODUCT_COMPONENTS')]
    #[Serializer\XmlList(entry: 'PRODUCT_COMPONENT')]
    protected array $productComponents = [];

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('QUANTITY')]
    protected float $quantity;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_UNIT')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $orderUnit;

    #[Serializer\Expose]
    #[Serializer\Type(PriceFix::class)]
    #[Serializer\SerializedName('PRODUCT_PRICE_FIX')]
    protected PriceFix $priceFix;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('PRICE_LINE_AMOUNT')]
    protected float $priceLineAmount;

    /**
     *
     * @var boolean
     */
    #[Serializer\Expose]
    #[Serializer\Type('bool')]
    #[Serializer\SerializedName('PARTIAL_SHIPMENT_ALLOWED')]
    protected bool $partialShipmentAllowed;

    #[Serializer\Expose]
    #[Serializer\Type(DeliveryDate::class)]
    #[Serializer\SerializedName('DELIVERY_DATE')]
    protected DeliveryDate $deliveryDate;

    /**
     * @var Remarks[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Remarks::class . '>')]
    #[Serializer\XmlList(entry: 'REMARKS', inline: true)]
    protected array $remarks = [];

    /**
     * @var array<string, UdxInterface>
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('ITEM_UDX')]
    #[Serializer\Type('array<string,' . Udx::class . '>')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlKeyValuePairs]
    protected array $itemUdx = [];

    /**
     * @param UdxInterface[]|array{vendor: string, name: string, value: string}[] $udxItems
     */
    public function setItemUdx(array $udxItems): self
    {
        $this->itemUdx = [];

        foreach ($udxItems as $udxItem) {
            if (!$udxItem instanceof UdxInterface) {
                $udxItem = $this->convertToUdx($udxItem);
            }

            $this->itemUdx[$this->createUdxElementName($udxItem)] = $udxItem;
        }

        return $this;
    }

    public function isPartialShipmentAllowed(): bool
    {
        return $this->partialShipmentAllowed;
    }
}
