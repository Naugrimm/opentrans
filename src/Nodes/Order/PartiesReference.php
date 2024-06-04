<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\BuyerIdRef;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\OpenTrans\Nodes\InvoiceRcptIdRef;

/**
 * @implements NodeInterface<PartiesReference>
 * @method self setBuyerIdRef(array|\Naugrim\BMEcat\Nodes\BuyerIdRef $buyerIdRef)
 * @method \Naugrim\BMEcat\Nodes\BuyerIdRef getBuyerIdRef()
 * @method self setSupplierIdRef(array|\Naugrim\BMEcat\Nodes\SupplierIdRef $supplierIdRef)
 * @method \Naugrim\BMEcat\Nodes\SupplierIdRef getSupplierIdRef()
 * @method self setInvoiceRcptIdRef(array|\Naugrim\OpenTrans\Nodes\InvoiceRcptIdRef $invoiceRcptIdRef)
 * @method \Naugrim\OpenTrans\Nodes\InvoiceRcptIdRef getInvoiceRcptIdRef()
 * @method self setShipmentPartiesReference(array|\Naugrim\OpenTrans\Nodes\Order\ShipmentPartiesReference $shipmentPartiesReference)
 * @method \Naugrim\OpenTrans\Nodes\Order\ShipmentPartiesReference getShipmentPartiesReference()
 */
class PartiesReference implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(BuyerIdRef::class)]
    #[Serializer\SerializedName('BUYER_IDREF')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected BuyerIdRef $buyerIdRef;

    #[Serializer\Expose]
    #[Serializer\Type(SupplierIdRef::class)]
    #[Serializer\SerializedName('SUPPLIER_IDREF')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected SupplierIdRef $supplierIdRef;

    #[Serializer\Expose]
    #[Serializer\Type(InvoiceRcptIdRef::class)]
    #[Serializer\SerializedName('INVOICE_RECIPIENT_IDREF')]
    protected InvoiceRcptIdRef $invoiceRcptIdRef;

    #[Serializer\Expose]
    #[Serializer\Type(ShipmentPartiesReference::class)]
    #[Serializer\SerializedName('SHIPMENT_PARTIES_REFERENCE')]
    protected ShipmentPartiesReference $shipmentPartiesReference;
}
