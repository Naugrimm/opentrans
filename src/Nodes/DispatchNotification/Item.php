<?php

namespace Naugrim\OpenTrans\Nodes\DispatchNotification;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\OpenTrans\Nodes\Invoice\OrderReference;
use Naugrim\OpenTrans\Nodes\Invoice\SupplierOrderReference;
use Naugrim\OpenTrans\Nodes\Order\CustomerOrderReference;
use Naugrim\OpenTrans\Nodes\Order\ShipmentPartiesReference;
use Naugrim\OpenTrans\Nodes\Product\PriceFix;
use Naugrim\OpenTrans\Nodes\ProductId;

/**
 * @implements NodeInterface<Item>
 */
class Item implements NodeInterface
{
    use HasSerializableAttributes;

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
    #[Serializer\Type(SupplierIdRef::class)]
    #[Serializer\SerializedName('SUPPLIER_IDREF')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected SupplierIdRef $supplierIdRef;

    #[Serializer\Expose]
    #[Serializer\Type(OrderReference::class)]
    #[Serializer\SerializedName('ORDER_REFERENCE')]
    protected ?OrderReference $orderReference;

    #[Serializer\Expose]
    #[Serializer\Type(SupplierOrderReference::class)]
    #[Serializer\SerializedName('SUPPLIER_ORDER_REFERENCE')]
    protected ?SupplierOrderReference $supplierOrderReference;

    #[Serializer\Expose]
    #[Serializer\Type(CustomerOrderReference::class)]
    #[Serializer\SerializedName('CUSTOMER_ORDER_REFERENCE')]
    protected ?CustomerOrderReference $customerOrderReference = null;

    #[Serializer\Expose]
    #[Serializer\Type(ShipmentPartiesReference::class)]
    #[Serializer\SerializedName('SHIPMENT_PARTIES_REFERENCE')]
    protected ShipmentPartiesReference $shipmentPartiesReference;
}
