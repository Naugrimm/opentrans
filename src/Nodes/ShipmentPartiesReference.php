<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<ShipmentPartiesReference>
 * @method self setDeliveryIdRef(array|\Naugrim\OpenTrans\Nodes\DeliveryIdRef $deliveryIdRef)
 * @method \Naugrim\OpenTrans\Nodes\DeliveryIdRef getDeliveryIdRef()
 * @method self setFinalDeliveryIdRef(array|\Naugrim\OpenTrans\Nodes\FinalDeliveryIdRef $finalDeliveryIdRef)
 * @method \Naugrim\OpenTrans\Nodes\FinalDeliveryIdRef getFinalDeliveryIdRef()
 * @method self setDelivererIdRef(array|\Naugrim\OpenTrans\Nodes\DelivererIdRef $delivererIdRef)
 * @method \Naugrim\OpenTrans\Nodes\DelivererIdRef getDelivererIdRef()
 */
class ShipmentPartiesReference implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type(DeliveryIdRef::class)]
    #[Serializer\SerializedName('INVOICE_RECIPIENT_IDREF')]
    protected DeliveryIdRef $deliveryIdRef;

    #[Serializer\Expose]
    #[Serializer\Type(FinalDeliveryIdRef::class)]
    #[Serializer\SerializedName('FINAL_DELIVERY_IDREF')]
    protected FinalDeliveryIdRef $finalDeliveryIdRef;

    #[Serializer\Expose]
    #[Serializer\Type(DelivererIdRef::class)]
    #[Serializer\SerializedName('DELIVERER_IDREF')]
    protected DelivererIdRef $delivererIdRef;
}
