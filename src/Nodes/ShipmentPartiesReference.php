<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<ShipmentPartiesReference>
 */
class ShipmentPartiesReference implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     *
     * @var DeliveryIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(DeliveryIdRef::class)]
    #[Serializer\SerializedName('INVOICE_RECIPIENT_IDREF')]
    protected DeliveryIdRef $deliveryIdRef;

    /**
     *
     * @var FinalDeliveryIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(FinalDeliveryIdRef::class)]
    #[Serializer\SerializedName('FINAL_DELIVERY_IDREF')]
    protected FinalDeliveryIdRef $finalDeliveryIdRef;

    /**
     *
     * @var DelivererIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(DelivererIdRef::class)]
    #[Serializer\SerializedName('DELIVERER_IDREF')]
    protected DelivererIdRef $delivererIdRef;
}
