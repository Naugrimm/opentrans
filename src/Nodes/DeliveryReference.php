<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<DeliveryReference>
 * @method self setDeliverynoteId(string|null $deliverynoteId)
 * @method string|null getDeliverynoteId()
 * @method self setLineItemId(string|null $lineItemId)
 * @method string|null getLineItemId()
 * @method self setDeliveryDate(null|array<string, mixed>|\Naugrim\OpenTrans\Nodes\DeliveryDate $deliveryDate)
 * @method \Naugrim\OpenTrans\Nodes\DeliveryDate|null getDeliveryDate()
 * @method self setDeliveryIdRef(null|array<string, mixed>|\Naugrim\OpenTrans\Nodes\DeliveryIdRef $deliveryIdRef)
 * @method \Naugrim\OpenTrans\Nodes\DeliveryIdRef|null getDeliveryIdRef()
 */
class DeliveryReference implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERYNOTE_ID')]
    protected ?string $deliverynoteId = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LINE_ITEM_ID')]
    protected ?string $lineItemId = null;

    #[Serializer\Expose]
    #[Serializer\Type(DeliveryDate::class)]
    #[Serializer\SerializedName('DELIVERY_DATE')]
    protected ?DeliveryDate $deliveryDate = null;

    #[Serializer\Expose]
    #[Serializer\Type(DeliveryIdRef::class)]
    #[Serializer\SerializedName('DELIVERY_IDREF')]
    protected ?DeliveryIdRef $deliveryIdRef = null;
}
