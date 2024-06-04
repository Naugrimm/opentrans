<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<CustomerOrderReference>
 * @method self setOrderId(string|null $orderId)
 * @method string|null getOrderId()
 * @method self setLineItemId(string|null $lineItemId)
 * @method string|null getLineItemId()
 * @method self setOrderDate(null|array|\DateTimeInterface $orderDate)
 * @method \DateTimeInterface|null getOrderDate()
 * @method self setOrderDescr(string|null $orderDescr)
 * @method string|null getOrderDescr()
 * @method self setCustomerIdRef(null|array|\Naugrim\OpenTrans\Nodes\Order\CustomerIdRef $customerIdRef)
 * @method \Naugrim\OpenTrans\Nodes\Order\CustomerIdRef|null getCustomerIdRef()
 */
class CustomerOrderReference implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_ID')]
    protected ?string $orderId = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LINE_ITEM_ID')]
    protected ?string $lineItemId = null;

    #[Serializer\Expose]
    #[Serializer\Type(DateTimeInterface::class . "<'Y-m-d\\TH:i:sP', '', ['Y-m-d\\TH:i:s', 'Y-m-d\\TH:i:sP']>")]
    #[Serializer\SerializedName('ORDER_DATE')]
    protected ?DateTimeInterface $orderDate = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_DESCR')]
    protected ?string $orderDescr = null;

    #[Serializer\Expose]
    #[Serializer\Type(CustomerIdRef::class)]
    #[Serializer\SerializedName('CUSTOMER_IDREF')]
    protected ?CustomerIdRef $customerIdRef = null;
}
