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
 * @method self setSourcingInfo(array|\Naugrim\OpenTrans\Nodes\SourcingInfo $sourcingInfo)
 * @method \Naugrim\OpenTrans\Nodes\SourcingInfo getSourcingInfo()
 * @method self setLineItemId(string $lineItemId)
 * @method string getLineItemId()
 * @method self setProductId(array|\Naugrim\OpenTrans\Nodes\ProductId $productId)
 * @method \Naugrim\OpenTrans\Nodes\ProductId getProductId()
 * @method self setProductComponents(\Naugrim\OpenTrans\Nodes\Product\ProductComponent[]|array $productComponents)
 * @method \Naugrim\OpenTrans\Nodes\Product\ProductComponent[]|array getProductComponents()
 * @method self setQuantity(float $quantity)
 * @method float getQuantity()
 * @method self setOrderUnit(string $orderUnit)
 * @method string getOrderUnit()
 * @method self setPriceFix(null|array|\Naugrim\OpenTrans\Nodes\Product\PriceFix $priceFix)
 * @method \Naugrim\OpenTrans\Nodes\Product\PriceFix|null getPriceFix()
 * @method self setPriceLineAmount(float|null $priceLineAmount)
 * @method float|null getPriceLineAmount()
 * @method self setPartialShipmentAllowed(bool|null $partialShipmentAllowed)
 * @method bool|null getPartialShipmentAllowed()
 * @method self setCustomerOrderReference(null|array|\Naugrim\OpenTrans\Nodes\Order\CustomerOrderReference $customerOrderReference)
 * @method \Naugrim\OpenTrans\Nodes\Order\CustomerOrderReference|null getCustomerOrderReference()
 * @method self setDeliveryDate(null|array|\Naugrim\OpenTrans\Nodes\DeliveryDate $deliveryDate)
 * @method \Naugrim\OpenTrans\Nodes\DeliveryDate|null getDeliveryDate()
 * @method self setRemarks(\Naugrim\OpenTrans\Nodes\Remarks[]|array $remarks)
 * @method \Naugrim\OpenTrans\Nodes\Remarks[]|array getRemarks()
 * @method self setItemUdx(array $itemUdx)
 * @method array getItemUdx()
 */
#[Serializer\AccessorOrder(order: 'custom', custom: ['lineItemId', 'productId', 'productComponents', 'quantity', 'orderUnit', 'priceFix', 'priceLineAmount', 'deliveryDate', 'partialShipmentAllowed', 'customerOrderReference', 'sourcingInfo', 'remarks', 'itemUdx'])]
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
    protected ?PriceFix $priceFix = null;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('PRICE_LINE_AMOUNT')]
    protected ?float $priceLineAmount = null;

    /**
     *
     * @var boolean
     */
    #[Serializer\Expose]
    #[Serializer\Type('bool')]
    #[Serializer\SerializedName('PARTIAL_SHIPMENT_ALLOWED')]
    protected ?bool $partialShipmentAllowed = null;

    #[Serializer\Expose]
    #[Serializer\Type(CustomerOrderReference::class)]
    #[Serializer\SerializedName('CUSTOMER_ORDER_REFERENCE')]
    protected ?CustomerOrderReference $customerOrderReference = null;

    #[Serializer\Expose]
    #[Serializer\Type(DeliveryDate::class)]
    #[Serializer\SerializedName('DELIVERY_DATE')]
    protected ?DeliveryDate $deliveryDate = null;

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
            if (! $udxItem instanceof UdxInterface) {
                $udxItem = $this->convertToUdx($udxItem);
            }

            $this->itemUdx[$this->createUdxElementName($udxItem)] = $udxItem;
        }

        return $this;
    }

    public function isPartialShipmentAllowed(): bool
    {
        return $this->partialShipmentAllowed ?? false;
    }
}
