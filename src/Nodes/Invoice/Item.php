<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Product\PriceFix;
use Naugrim\OpenTrans\Nodes\ProductId;

/**
 * @implements NodeInterface<Item>
 * @method self setType(string $type)
 * @method string getType()
 * @method self setLineItemId(string $lineItemId)
 * @method string getLineItemId()
 * @method self setProductId(array|\Naugrim\OpenTrans\Nodes\ProductId $productId)
 * @method \Naugrim\OpenTrans\Nodes\ProductId getProductId()
 * @method self setQuantity(float $quantity)
 * @method float getQuantity()
 * @method self setOrderUnit(string $orderUnit)
 * @method string getOrderUnit()
 * @method self setPriceFix(array|\Naugrim\OpenTrans\Nodes\Product\PriceFix $priceFix)
 * @method \Naugrim\OpenTrans\Nodes\Product\PriceFix getPriceFix()
 * @method self setPriceLineAmount(float $priceLineAmount)
 * @method float getPriceLineAmount()
 * @method self setOrderReference(null|array|\Naugrim\OpenTrans\Nodes\Invoice\OrderReference $orderReference)
 * @method \Naugrim\OpenTrans\Nodes\Invoice\OrderReference|null getOrderReference()
 * @method self setSupplierOrderReference(null|array|\Naugrim\OpenTrans\Nodes\Invoice\SupplierOrderReference $supplierOrderReference)
 * @method \Naugrim\OpenTrans\Nodes\Invoice\SupplierOrderReference|null getSupplierOrderReference()
 */
class Item implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('type')]
    #[Serializer\XmlAttribute]
    protected string $type;

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

    #[Serializer\Expose]
    #[Serializer\Type(OrderReference::class)]
    #[Serializer\SerializedName('ORDER_REFERENCE')]
    protected ?OrderReference $orderReference = null;

    #[Serializer\Expose]
    #[Serializer\Type(SupplierOrderReference::class)]
    #[Serializer\SerializedName('SUPPLIER_ORDER_REFERENCE')]
    protected ?SupplierOrderReference $supplierOrderReference = null;
}
