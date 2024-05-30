<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\BuyerPid;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\InternationalPid;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\BMEcat\Nodes\SupplierPid;

/**
 * @implements NodeInterface<ProductId>
 */
class ProductId implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type(SupplierPid::class)]
    #[Serializer\SerializedName('bme:SUPPLIER_PID')]
    protected SupplierPid $supplierPid;

    #[Serializer\Expose]
    #[Serializer\Type(SupplierIdRef::class)]
    #[Serializer\SerializedName('bme:SUPPLIER_IDREF')]
    protected SupplierIdRef $supplierIdRef;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CONFIG_CODE_FIX')]
    protected string $configCodeFix;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LOT_NUMBER')]
    protected string $lotNumber;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('SERIAL_NUMBER')]
    protected string $serialNumber;

    #[Serializer\Expose]
    #[Serializer\Type(InternationalPid::class)]
    #[Serializer\SerializedName('bme:INTERNATIONAL_PID')]
    protected InternationalPid $internationalPid;

    #[Serializer\Expose]
    #[Serializer\Type(BuyerPid::class)]
    #[Serializer\SerializedName('bme:BUYER_PID')]
    protected BuyerPid $buyerPid;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:DESCRIPTION_SHORT')]
    protected string $descriptionShort;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:DESCRIPTION_LONG')]
    protected string $descriptionLong;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:PRODUCT_TYPE')]
    protected string $productType;
}
