<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasUdxItems;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\Product\PriceFix;
use Naugrim\OpenTrans\Nodes\ProductId;

/**
 * @implements NodeInterface<Item>
 */
class Item implements NodeInterface
{
    use HasSerializableAttributes;
    use HasUdxItems;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LINE_ITEM_ID')]
    protected string $lineItemId;

    #[Serializer\Expose]
    #[Serializer\Type(ProductId::class)]
    #[Serializer\SerializedName('PRODUCT_ID')]
    protected ProductId $productId;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('QUANTITY')]
    protected float $quantity;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:ORDER_UNIT')]
    protected string $orderUnit;

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

    #[Serializer\Expose]
    #[Serializer\Type(PriceFix::class)]
    #[Serializer\SerializedName('PRODUCT_PRICE_FIX')]
    protected PriceFix $priceFix;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('PRICE_LINE_AMOUNT')]
    protected float $priceLineAmount;

    public function isPartialShipmentAllowed(): bool
    {
        return $this->partialShipmentAllowed;
    }
}
