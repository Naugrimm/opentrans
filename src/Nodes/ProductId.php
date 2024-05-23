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
     *
     * @var SupplierPid
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\BMEcat\Nodes\SupplierPid::class)]
    #[Serializer\SerializedName('bme:SUPPLIER_PID')]
    protected $supplierPid;

    /**
     *
     * @var SupplierIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\BMEcat\Nodes\SupplierIdRef::class)]
    #[Serializer\SerializedName('bme:SUPPLIER_IDREF')]
    protected $supplierIdRef;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CONFIG_CODE_FIX')]
    protected $configCodeFix;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LOT_NUMBER')]
    protected $lotNumber;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('SERIAL_NUMBER')]
    protected $serialNumber;

    /**
     *
     * @var InternationalPid
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\BMEcat\Nodes\InternationalPid::class)]
    #[Serializer\SerializedName('bme:INTERNATIONAL_PID')]
    protected $internationalPid;

    /**
     *
     * @var BuyerPid
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\BMEcat\Nodes\BuyerPid::class)]
    #[Serializer\SerializedName('bme:BUYER_PID')]
    protected $buyerPid;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:DESCRIPTION_SHORT')]
    protected $descriptionShort;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:DESCRIPTION_LONG')]
    protected $descriptionLong;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:PRODUCT_TYPE')]
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
