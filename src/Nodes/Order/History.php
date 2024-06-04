<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Agreement;
use Naugrim\OpenTrans\Nodes\Catalog\Reference;

/**
 * @implements NodeInterface<History>
 * @method self setOrderId(string $orderId)
 * @method string getOrderId()
 * @method self setAltCustomerOrderId(string $altCustomerOrderId)
 * @method string getAltCustomerOrderId()
 * @method self setSupplierOrderId(string $supplierOrderId)
 * @method string getSupplierOrderId()
 * @method self setOrderDate(string $orderDate)
 * @method string getOrderDate()
 * @method self setOrderDescription(string $orderDescription)
 * @method string getOrderDescription()
 * @method self setDeliverynoteId(string $deliverynoteId)
 * @method string getDeliverynoteId()
 * @method self setDeliverynoteDate(string $deliverynoteDate)
 * @method string getDeliverynoteDate()
 * @method self setAgreement(array|\Naugrim\OpenTrans\Nodes\Agreement $agreement)
 * @method \Naugrim\OpenTrans\Nodes\Agreement getAgreement()
 * @method self setCatalogReference(array|\Naugrim\OpenTrans\Nodes\Catalog\Reference $catalogReference)
 * @method \Naugrim\OpenTrans\Nodes\Catalog\Reference getCatalogReference()
 */
class History implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_ID')]
    protected string $orderId;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ALT_CUSTOMER_ORDER_ID')]
    protected string $altCustomerOrderId;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('SUPPLIER_ORDER_ID')]
    protected string $supplierOrderId;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_DATE')]
    protected string $orderDate;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_DESCR')]
    protected string $orderDescription;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERYNOTE_ID')]
    protected string $deliverynoteId;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERYNOTE_DATE')]
    protected string $deliverynoteDate;

    #[Serializer\Expose]
    #[Serializer\Type(Agreement::class)]
    #[Serializer\SerializedName('AGREEMENT')]
    protected Agreement $agreement;

    #[Serializer\Expose]
    #[Serializer\Type(Reference::class)]
    #[Serializer\SerializedName('CATALOG_REFERENCE')]
    protected Reference $catalogReference;
}
