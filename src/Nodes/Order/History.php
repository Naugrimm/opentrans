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
 * @method self setAltCustomerOrderId(string|null $altCustomerOrderId)
 * @method string|null getAltCustomerOrderId()
 * @method self setSupplierOrderId(string|null $supplierOrderId)
 * @method string|null getSupplierOrderId()
 * @method self setOrderDate(string|null $orderDate)
 * @method string|null getOrderDate()
 * @method self setOrderDescription(string|null $orderDescription)
 * @method string|null getOrderDescription()
 * @method self setDeliverynoteId(string|null $deliverynoteId)
 * @method string|null getDeliverynoteId()
 * @method self setDeliverynoteDate(string|null $deliverynoteDate)
 * @method string|null getDeliverynoteDate()
 * @method self setAgreement(null|array<string, mixed>|\Naugrim\OpenTrans\Nodes\Agreement $agreement)
 * @method \Naugrim\OpenTrans\Nodes\Agreement|null getAgreement()
 * @method self setCatalogReference(null|array<string, mixed>|\Naugrim\OpenTrans\Nodes\Catalog\Reference $catalogReference)
 * @method \Naugrim\OpenTrans\Nodes\Catalog\Reference|null getCatalogReference()
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
    protected ?string $altCustomerOrderId = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('SUPPLIER_ORDER_ID')]
    protected ?string $supplierOrderId = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_DATE')]
    protected ?string $orderDate = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_DESCR')]
    protected ?string $orderDescription = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERYNOTE_ID')]
    protected ?string $deliverynoteId = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERYNOTE_DATE')]
    protected ?string $deliverynoteDate = null;

    #[Serializer\Expose]
    #[Serializer\Type(Agreement::class)]
    #[Serializer\SerializedName('AGREEMENT')]
    protected ?Agreement $agreement = null;

    #[Serializer\Expose]
    #[Serializer\Type(Reference::class)]
    #[Serializer\SerializedName('CATALOG_REFERENCE')]
    protected ?Reference $catalogReference = null;
}
