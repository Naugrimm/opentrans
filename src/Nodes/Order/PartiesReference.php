<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\BuyerIdRef;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\OpenTrans\Nodes\InvoiceRcptIdRef;
use Naugrim\OpenTrans\Nodes\ShipmentPartiesReference;

class PartiesReference implements NodeInterface
{
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

    /**
     * @return BuyerIdRef
     */
    public function getBuyerIdRef(): BuyerIdRef
    {
        return $this->buyerIdRef;
    }

    /**
     * @param BuyerIdRef $buyerIdRef
     * @return PartiesReference
     */
    public function setBuyerIdRef(BuyerIdRef $buyerIdRef): PartiesReference
    {
        $this->buyerIdRef = $buyerIdRef;
        return $this;
    }

    /**
     * @return SupplierIdRef
     */
    public function getSupplierIdRef(): SupplierIdRef
    {
        return $this->supplierIdRef;
    }

    /**
     * @param SupplierIdRef $supplierIdRef
     * @return PartiesReference
     */
    public function setSupplierIdRef(SupplierIdRef $supplierIdRef): PartiesReference
    {
        $this->supplierIdRef = $supplierIdRef;
        return $this;
    }

    /**
     * @return InvoiceRcptIdRef
     */
    public function getInvoiceRcptIdRef(): InvoiceRcptIdRef
    {
        return $this->invoiceRcptIdRef;
    }

    /**
     * @param InvoiceRcptIdRef $invoiceRcptIdRef
     * @return PartiesReference
     */
    public function setInvoiceRcptIdRef(InvoiceRcptIdRef $invoiceRcptIdRef): PartiesReference
    {
        $this->invoiceRcptIdRef = $invoiceRcptIdRef;
        return $this;
    }

    /**
     * @return ShipmentPartiesReference
     */
    public function getShipmentPartiesReference(): ShipmentPartiesReference
    {
        return $this->shipmentPartiesReference;
    }

    /**
     * @param ShipmentPartiesReference $shipmentPartiesReference
     * @return PartiesReference
     */
    public function setShipmentPartiesReference(ShipmentPartiesReference $shipmentPartiesReference): PartiesReference
    {
        $this->shipmentPartiesReference = $shipmentPartiesReference;
        return $this;
    }
}
