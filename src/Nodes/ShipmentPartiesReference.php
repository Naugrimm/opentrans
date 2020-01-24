<?php

namespace Naugrim\OpenTrans\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

class ShipmentPartiesReference implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\DeliveryIdRef")
     * @Serializer\SerializedName("INVOICE_RECIPIENT_IDREF")
     *
     * @var DeliveryIdRef
     */
    protected $deliveryIdRef;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\FinalDeliveryIdRef")
     * @Serializer\SerializedName("INVOICE_RECIPIENT_IDREF")
     *
     * @var FinalDeliveryIdRef
     */
    protected $finalDeliveryIdRef;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\DelivererIdRef")
     * @Serializer\SerializedName("INVOICE_RECIPIENT_IDREF")
     *
     * @var DelivererIdRef
     */
    protected $delivererIdRef;
}
