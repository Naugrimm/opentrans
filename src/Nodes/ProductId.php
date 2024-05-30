<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\BuyerPid;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\InternationalPid;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\BMEcat\Nodes\SupplierPid;

class ProductId implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     *
     * @var SupplierPid
     */
    #[Serializer\Expose]
    #[Serializer\Type(SupplierPid::class)]
    #[Serializer\SerializedName('bme:SUPPLIER_PID')]
    protected SupplierPid $supplierPid;

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
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CONFIG_CODE_FIX')]
    protected string $configCodeFix;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LOT_NUMBER')]
    protected string $lotNumber;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('SERIAL_NUMBER')]
    protected string $serialNumber;

    /**
     *
     * @var InternationalPid
     */
    #[Serializer\Expose]
    #[Serializer\Type(InternationalPid::class)]
    #[Serializer\SerializedName('bme:INTERNATIONAL_PID')]
    protected InternationalPid $internationalPid;

    /**
     *
     * @var BuyerPid
     */
    #[Serializer\Expose]
    #[Serializer\Type(BuyerPid::class)]
    #[Serializer\SerializedName('bme:BUYER_PID')]
    protected BuyerPid $buyerPid;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:DESCRIPTION_SHORT')]
    protected string $descriptionShort;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:DESCRIPTION_LONG')]
    protected string $descriptionLong;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:PRODUCT_TYPE')]
    protected string $productType;
}
