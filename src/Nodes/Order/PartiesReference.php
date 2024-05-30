<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\BuyerIdRef;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\OpenTrans\Nodes\InvoiceRcptIdRef;
use Naugrim\OpenTrans\Nodes\ShipmentPartiesReference;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<PartiesReference>
 */
class PartiesReference implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     *
     * @var BuyerIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(BuyerIdRef::class)]
    #[Serializer\SerializedName('bme:BUYER_IDREF')]
    protected BuyerIdRef $buyerIdRef;

    /**
     *
     * @var SupplierIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(SupplierIdRef::class)]
    #[Serializer\SerializedName('bme:SUPPLIER_IDREF')]
    protected SupplierIdRef $supplierIdRef;

    /**
     *
     * @var InvoiceRcptIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(InvoiceRcptIdRef::class)]
    #[Serializer\SerializedName('INVOICE_RECIPIENT_IDREF')]
    protected InvoiceRcptIdRef $invoiceRcptIdRef;

    /**
     *
     * @var ShipmentPartiesReference
     */
    #[Serializer\Expose]
    #[Serializer\Type(ShipmentPartiesReference::class)]
    #[Serializer\SerializedName('SHIPMENT_PARTIES_REFERENCE')]
    protected ShipmentPartiesReference $shipmentPartiesReference;
}
