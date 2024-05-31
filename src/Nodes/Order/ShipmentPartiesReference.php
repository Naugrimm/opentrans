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
