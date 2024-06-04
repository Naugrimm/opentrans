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
 * @method self setSupplierPid(null|array|\Naugrim\BMEcat\Nodes\SupplierPid $supplierPid)
 * @method \Naugrim\BMEcat\Nodes\SupplierPid|null getSupplierPid()
 * @method self setSupplierIdRef(null|array|\Naugrim\BMEcat\Nodes\SupplierIdRef $supplierIdRef)
 * @method \Naugrim\BMEcat\Nodes\SupplierIdRef|null getSupplierIdRef()
 * @method self setConfigCodeFix(string|null $configCodeFix)
 * @method string|null getConfigCodeFix()
 * @method self setLotNumber(array $lotNumber)
 * @method string[] getLotNumber()
 * @method self setSerialNumber(array $serialNumber)
 * @method string[] getSerialNumber()
 * @method self setInternationalPid(\Naugrim\BMEcat\Nodes\InternationalPid[]|array $internationalPid)
 * @method \Naugrim\BMEcat\Nodes\InternationalPid[]|array getInternationalPid()
 * @method self setBuyerPid(\Naugrim\BMEcat\Nodes\BuyerPid[]|array $buyerPid)
 * @method \Naugrim\BMEcat\Nodes\BuyerPid[]|array getBuyerPid()
 * @method self setDescriptionShort(string|null $descriptionShort)
 * @method string|null getDescriptionShort()
 * @method self setDescriptionLong(string|null $descriptionLong)
 * @method string|null getDescriptionLong()
 * @method self setManufacturerInfo(null|array|\Naugrim\OpenTrans\Nodes\ManufacturerInfo $manufacturerInfo)
 * @method \Naugrim\OpenTrans\Nodes\ManufacturerInfo|null getManufacturerInfo()
 * @method self setProductType(string|null $productType)
 * @method string|null getProductType()
 */
class ProductId implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(SupplierPid::class)]
    #[Serializer\SerializedName('SUPPLIER_PID')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?SupplierPid $supplierPid = null;

    #[Serializer\Expose]
    #[Serializer\Type(SupplierIdRef::class)]
    #[Serializer\SerializedName('SUPPLIER_IDREF')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?SupplierIdRef $supplierIdRef = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CONFIG_CODE_FIX')]
    protected ?string $configCodeFix = null;

    /**
     * @var string[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<string>')]
    #[Serializer\XmlList(entry: 'LOT_NUMBER', inline: true)]
    protected array $lotNumber = [];

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
    protected ?string $descriptionShort = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DESCRIPTION_LONG')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $descriptionLong = null;

    #[Serializer\Expose]
    #[Serializer\Type(ManufacturerInfo::class)]
    #[Serializer\SerializedName('MANUFACTURER_INFO')]
    protected ?ManufacturerInfo $manufacturerInfo = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('PRODUCT_TYPE')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $productType = null;
}
