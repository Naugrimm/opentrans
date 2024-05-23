<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasUdxItems;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\Product\PriceFix;
use Naugrim\OpenTrans\Nodes\ProductId;

class Item implements NodeInterface
{
    use HasUdxItems;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LINE_ITEM_ID')]
    protected $lineItemId;

    /**
     *
     * @var ProductId
     */
    #[Serializer\Expose]
    #[Serializer\Type('Naugrim\OpenTrans\Nodes\ProductId')]
    #[Serializer\SerializedName('PRODUCT_ID')]
    protected $productId;

    /**
     *
     * @var float
     */
    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('QUANTITY')]
    protected $quantity;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:ORDER_UNIT')]
    protected $orderUnit;

    /**
     *
     * @var boolean
     */
    #[Serializer\Expose]
    #[Serializer\Type('bool')]
    #[Serializer\SerializedName('PARTIAL_SHIPMENT_ALLOWED')]
    protected $partialShipmentAllowed;

    /**
     *
     * @var DeliveryDate
     */
    #[Serializer\Expose]
    #[Serializer\Type('Naugrim\OpenTrans\Nodes\DeliveryDate')]
    #[Serializer\SerializedName('DELIVERY_DATE')]
    protected $deliveryDate;

    /**
     *
     * @var PriceFix
     */
    #[Serializer\Expose]
    #[Serializer\Type('Naugrim\OpenTrans\Nodes\Product\PriceFix')]
    #[Serializer\SerializedName('PRODUCT_PRICE_FIX')]
    protected $priceFix;

    /**
     *
     * @var float
     */
    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('PRICE_LINE_AMOUNT')]
    protected $priceLineAmount;

    /**
     * @return string
     */
    public function getLineItemId(): string
    {
        return $this->lineItemId;
    }

    /**
     * @param string $lineItemId
     * @return Item
     */
    public function setLineItemId(string $lineItemId): Item
    {
        $this->lineItemId = $lineItemId;
        return $this;
    }

    /**
     * @return ProductId
     */
    public function getProductId(): ProductId
    {
        return $this->productId;
    }

    /**
     * @param ProductId $productId
     * @return Item
     */
    public function setProductId(ProductId $productId): Item
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return Item
     */
    public function setQuantity(float $quantity): Item
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderUnit(): string
    {
        return $this->orderUnit;
    }

    /**
     * @param string $orderUnit
     * @return Item
     */
    public function setOrderUnit(string $orderUnit): Item
    {
        $this->orderUnit = $orderUnit;
        return $this;
    }

    /**
     * @return PriceFix
     */
    public function getPriceFix(): PriceFix
    {
        return $this->priceFix;
    }

    /**
     * @param PriceFix $priceFix
     * @return Item
     */
    public function setPriceFix(PriceFix $priceFix): Item
    {
        $this->priceFix = $priceFix;
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceLineAmount(): float
    {
        return $this->priceLineAmount;
    }

    /**
     * @param float $priceLineAmount
     * @return Item
     */
    public function setPriceLineAmount(float $priceLineAmount): Item
    {
        $this->priceLineAmount = $priceLineAmount;
        return $this;
    }

    public function getDeliveryDate(): DeliveryDate
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(DeliveryDate $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    public function setPartialShipmentAllowed(bool $partialShipmentAllowed): self
    {
        $this->partialShipmentAllowed = $partialShipmentAllowed;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPartialShipmentAllowed(): bool
    {
        return $this->partialShipmentAllowed;
    }
}
