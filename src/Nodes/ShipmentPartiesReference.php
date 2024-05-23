<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class ShipmentPartiesReference implements NodeInterface
{
    /**
     *
     * @var DeliveryIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\DeliveryIdRef::class)]
    #[Serializer\SerializedName('INVOICE_RECIPIENT_IDREF')]
    protected \Naugrim\OpenTrans\Nodes\DeliveryIdRef $deliveryIdRef;

    /**
     *
     * @var FinalDeliveryIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\FinalDeliveryIdRef::class)]
    #[Serializer\SerializedName('FINAL_DELIVERY_IDREF')]
    protected \Naugrim\OpenTrans\Nodes\FinalDeliveryIdRef $finalDeliveryIdRef;

    /**
     *
     * @var DelivererIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\DelivererIdRef::class)]
    #[Serializer\SerializedName('DELIVERER_IDREF')]
    protected \Naugrim\OpenTrans\Nodes\DelivererIdRef $delivererIdRef;
}
