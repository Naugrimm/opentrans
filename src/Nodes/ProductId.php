<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\BuyerPid;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\InternationalPid;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\BMEcat\Nodes\SupplierPid;

class ProductId implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\SupplierPid")
     * @Serializer\SerializedName("bme:SUPPLIER_PID")
     *
     * @var SupplierPid
     */
    protected $supplierPid;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\SupplierIdRef")
     * @Serializer\SerializedName("bme:SUPPLIER_IDREF")
     *
     * @var SupplierIdRef
     */
    protected $supplierIdRef;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CONFIG_CODE_FIX")
     *
     * @var string
     */
    protected $configCodeFix;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LOT_NUMBER")
     *
     * @var string
     */
    protected $lotNumber;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SERIAL_NUMBER")
     *
     * @var string
     */
    protected $serialNumber;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\InternationalPid")
     * @Serializer\SerializedName("bme:INTERNATIONAL_PID")
     *
     * @var InternationalPid
     */
    protected $internationalPid;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\BuyerPid")
     * @Serializer\SerializedName("bme:BUYER_PID")
     *
     * @var BuyerPid
     */
    protected $buyerPid;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:DESCRIPTION_SHORT")
     *
     * @var string
     */
    protected $descriptionShort;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:DESCRIPTION_LONG")
     *
     * @var string
     */
    protected $descriptionLong;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:PRODUCT_TYPE")
     *
     * @var string
     */
    protected $productType;

    /**
     * @return SupplierPid
     */
    public function getSupplierPid(): SupplierPid
    {
        return $this->supplierPid;
    }

    /**
     * @param SupplierPid $supplierPid
     * @return ProductId
     */
    public function setSupplierPid(SupplierPid $supplierPid): ProductId
    {
        $this->supplierPid = $supplierPid;
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
     * @return ProductId
     */
    public function setSupplierIdRef(SupplierIdRef $supplierIdRef): ProductId
    {
        $this->supplierIdRef = $supplierIdRef;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfigCodeFix(): string
    {
        return $this->configCodeFix;
    }

    /**
     * @param string $configCodeFix
     * @return ProductId
     */
    public function setConfigCodeFix(string $configCodeFix): ProductId
    {
        $this->configCodeFix = $configCodeFix;
        return $this;
    }

    /**
     * @return string
     */
    public function getLotNumber(): string
    {
        return $this->lotNumber;
    }

    /**
     * @param string $lotNumber
     * @return ProductId
     */
    public function setLotNumber(string $lotNumber): ProductId
    {
        $this->lotNumber = $lotNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getSerialNumber(): string
    {
        return $this->serialNumber;
    }

    /**
     * @param string $serialNumber
     * @return ProductId
     */
    public function setSerialNumber(string $serialNumber): ProductId
    {
        $this->serialNumber = $serialNumber;
        return $this;
    }

    /**
     * @return InternationalPid
     */
    public function getInternationalPid(): InternationalPid
    {
        return $this->internationalPid;
    }

    /**
     * @param InternationalPid $internationalPid
     * @return ProductId
     */
    public function setInternationalPid(InternationalPid $internationalPid): ProductId
    {
        $this->internationalPid = $internationalPid;
        return $this;
    }

    /**
     * @return BuyerPid
     */
    public function getBuyerPid(): BuyerPid
    {
        return $this->buyerPid;
    }

    /**
     * @param BuyerPid $buyerPid
     * @return ProductId
     */
    public function setBuyerPid(BuyerPid $buyerPid): ProductId
    {
        $this->buyerPid = $buyerPid;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionShort(): string
    {
        return $this->descriptionShort;
    }

    /**
     * @param string $descriptionShort
     * @return ProductId
     */
    public function setDescriptionShort(string $descriptionShort): ProductId
    {
        $this->descriptionShort = $descriptionShort;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionLong(): string
    {
        return $this->descriptionLong;
    }

    /**
     * @param string $descriptionLong
     * @return ProductId
     */
    public function setDescriptionLong(string $descriptionLong): ProductId
    {
        $this->descriptionLong = $descriptionLong;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductType(): string
    {
        return $this->productType;
    }

    /**
     * @param string $productType
     * @return ProductId
     */
    public function setProductType(string $productType): ProductId
    {
        $this->productType = $productType;
        return $this;
    }
}
