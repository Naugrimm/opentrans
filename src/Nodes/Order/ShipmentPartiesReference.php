<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\DelivererIdRef;
use Naugrim\OpenTrans\Nodes\DeliveryIdRef;
use Naugrim\OpenTrans\Nodes\FinalDeliveryIdRef;

/**
 * @implements NodeInterface<ShipmentPartiesReference>
 * @method self setDeliveryIdRef(array|\Naugrim\OpenTrans\Nodes\DeliveryIdRef $deliveryIdRef)
 * @method \Naugrim\OpenTrans\Nodes\DeliveryIdRef getDeliveryIdRef()
 * @method self setFinalDeliveryIdRef(null|array|\Naugrim\OpenTrans\Nodes\FinalDeliveryIdRef $finalDeliveryIdRef)
 * @method \Naugrim\OpenTrans\Nodes\FinalDeliveryIdRef|null getFinalDeliveryIdRef()
 * @method self setDelivererIdRef(null|array|\Naugrim\OpenTrans\Nodes\DelivererIdRef $delivererIdRef)
 * @method \Naugrim\OpenTrans\Nodes\DelivererIdRef|null getDelivererIdRef()
 */
class ShipmentPartiesReference implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(DeliveryIdRef::class)]
    #[Serializer\SerializedName('DELIVERY_IDREF')]
    protected DeliveryIdRef $deliveryIdRef;

    #[Serializer\Expose]
    #[Serializer\Type(FinalDeliveryIdRef::class)]
    #[Serializer\SerializedName('FINAL_DELIVERY_IDREF')]
    protected ?FinalDeliveryIdRef $finalDeliveryIdRef = null;

    #[Serializer\Expose]
    #[Serializer\Type(DelivererIdRef::class)]
    #[Serializer\SerializedName('DELIVERER_IDREF')]
    protected ?DelivererIdRef $delivererIdRef = null;
}
