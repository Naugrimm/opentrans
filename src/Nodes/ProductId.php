<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\BuyerPid;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\InternationalPid;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\BMEcat\Nodes\SupplierPid;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<ProductId>
 */
class ProductId implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(SupplierPid::class)]
    #[Serializer\SerializedName('SUPPLIER_PID')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected SupplierPid $supplierPid;

    #[Serializer\Expose]
    #[Serializer\Type(SupplierIdRef::class)]
    #[Serializer\SerializedName('SUPPLIER_IDREF')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected SupplierIdRef $supplierIdRef;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CONFIG_CODE_FIX')]
    protected string $configCodeFix;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LOT_NUMBER')]
    protected string $lotNumber;

    /**
     * @var string[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<string>')]
    #[Serializer\XmlList(entry: 'SERIAL_NUMBER', inline: true)]
    protected array $serialNumber = [];

    /**
     * @var InternationalPid[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . InternationalPid::class . '>')]
    #[Serializer\XmlList(entry: 'INTERNATIONAL_PID', inline: true, namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected array $internationalPid = [];

    /**
     * @var BuyerPid[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . BuyerPid::class . '>')]
    #[\JMS\Serializer\Annotation\XmlList(entry: 'BUYER_PID', inline: true, namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected array $buyerPid = [];

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DESCRIPTION_SHORT')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $descriptionShort;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DESCRIPTION_LONG')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $descriptionLong;

    #[Serializer\Expose]
    #[Serializer\Type(ManufacturerInfo::class)]
    #[Serializer\SerializedName('MANUFACTURER_INFO')]
    protected ManufacturerInfo|null $manufacturerInfo = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('PRODUCT_TYPE')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $productType;
}
