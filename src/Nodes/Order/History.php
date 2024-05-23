<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Agreement;
use Naugrim\OpenTrans\Nodes\Catalog\Reference;

class History implements NodeInterface
{
    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_ID')]
    protected string $orderId;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ALT_CUSTOMER_ORDER_ID')]
    protected string $altCustomerOrderId;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('SUPPLIER_ORDER_ID')]
    protected string $supplierOrderId;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_DATE')]
    protected string $orderDate;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_DESCR')]
    protected string $orderDescription;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERYNOTE_ID')]
    protected string $deliverynoteId;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERYNOTE_DATE')]
    protected string $deliverynoteDate;

    /**
     *
     * @var Agreement
     */
    #[Serializer\Expose]
    #[Serializer\Type(Agreement::class)]
    #[Serializer\SerializedName('AGREEMENT')]
    protected Agreement $agreement;

    /**
     *
     * @var Reference
     */
    #[Serializer\Expose]
    #[Serializer\Type(Reference::class)]
    #[Serializer\SerializedName('CATALOG_REFERENCE')]
    protected Reference $catalogReference;

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return History
     */
    public function setOrderId(string $orderId): History
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAltCustomerOrderId(): string
    {
        return $this->altCustomerOrderId;
    }

    /**
     * @param string $altCustomerOrderId
     * @return History
     */
    public function setAltCustomerOrderId(string $altCustomerOrderId): History
    {
        $this->altCustomerOrderId = $altCustomerOrderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSupplierOrderId(): string
    {
        return $this->supplierOrderId;
    }

    /**
     * @param string $supplierOrderId
     * @return History
     */
    public function setSupplierOrderId(string $supplierOrderId): History
    {
        $this->supplierOrderId = $supplierOrderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

    /**
     * @param string $orderDate
     * @return History
     */
    public function setOrderDate(string $orderDate): History
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDescription(): string
    {
        return $this->orderDescription;
    }

    /**
     * @param string $orderDescription
     * @return History
     */
    public function setOrderDescription(string $orderDescription): History
    {
        $this->orderDescription = $orderDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliverynoteId(): string
    {
        return $this->deliverynoteId;
    }

    /**
     * @param string $deliverynoteId
     * @return History
     */
    public function setDeliverynoteId(string $deliverynoteId): History
    {
        $this->deliverynoteId = $deliverynoteId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliverynoteDate(): string
    {
        return $this->deliverynoteDate;
    }

    /**
     * @param string $deliverynoteDate
     * @return History
     */
    public function setDeliverynoteDate(string $deliverynoteDate): History
    {
        $this->deliverynoteDate = $deliverynoteDate;
        return $this;
    }

    /**
     * @return Agreement
     */
    public function getAgreement(): Agreement
    {
        return $this->agreement;
    }

    /**
     * @param Agreement $agreement
     * @return History
     */
    public function setAgreement(Agreement $agreement): History
    {
        $this->agreement = $agreement;
        return $this;
    }

    /**
     * @return Reference
     */
    public function getCatalogReference(): Reference
    {
        return $this->catalogReference;
    }

    /**
     * @param Reference $catalogReference
     * @return History
     */
    public function setCatalogReference(Reference $catalogReference): History
    {
        $this->catalogReference = $catalogReference;
        return $this;
    }
}
