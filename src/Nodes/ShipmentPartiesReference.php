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
    #[Serializer\Type('Naugrim\OpenTrans\Nodes\DeliveryIdRef')]
    #[Serializer\SerializedName('INVOICE_RECIPIENT_IDREF')]
    protected $deliveryIdRef;

    /**
     *
     * @var FinalDeliveryIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type('Naugrim\OpenTrans\Nodes\FinalDeliveryIdRef')]
    #[Serializer\SerializedName('FINAL_DELIVERY_IDREF')]
    protected $finalDeliveryIdRef;

    /**
     *
     * @var DelivererIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type('Naugrim\OpenTrans\Nodes\DelivererIdRef')]
    #[Serializer\SerializedName('DELIVERER_IDREF')]
    protected $delivererIdRef;
}
