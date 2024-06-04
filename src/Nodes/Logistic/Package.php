<?php

namespace Naugrim\OpenTrans\Nodes\Logistic;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<self>
 * @method self setPackageId(\Naugrim\OpenTrans\Nodes\Logistic\PackageId[]|array $packageId)
 * @method \Naugrim\OpenTrans\Nodes\Logistic\PackageId[]|array getPackageId()
 * @method self setPackageDescr(string|null $packageDescr)
 * @method string|null getPackageDescr()
 * @method self setPackingUnitCode(string|null $packingUnitCode)
 * @method string|null getPackingUnitCode()
 * @method self setPackingUnitDescr(string|null $packingUnitDescr)
 * @method string|null getPackingUnitDescr()
 * @method self setPackageOrderUnitQuantity(float|null $packageOrderUnitQuantity)
 * @method float|null getPackageOrderUnitQuantity()
 * @method self setPackageQuantity(float|null $packageQuantity)
 * @method float|null getPackageQuantity()
 * @method self setPackageDimensions(null|array|\Naugrim\OpenTrans\Nodes\Logistic\PackageDimensions $packageDimensions)
 * @method \Naugrim\OpenTrans\Nodes\Logistic\PackageDimensions|null getPackageDimensions()
 * @method self setMeansOfTransportIdRef(string|null $meansOfTransportIdRef)
 * @method string|null getMeansOfTransportIdRef()
 * @method self setSubPackages(\Naugrim\OpenTrans\Nodes\Logistic\Package[]|array $subPackages)
 * @method \Naugrim\OpenTrans\Nodes\Logistic\Package[]|array getSubPackages()
 */
final class Package implements NodeInterface
{
    use HasSerializableAttributes;

    /**
     * @var PackageId[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . PackageId::class . '>')]
    #[Serializer\XmlList(entry: 'PACKAGE_ID', inline: true)]
    protected array $packageId = [];

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('PACKAGE_DESCR')]
    protected ?string $packageDescr = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('PACKING_UNIT_CODE')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    // todo validate valid packing units
    protected ?string $packingUnitCode = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('PACKING_UNIT_DESCR')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $packingUnitDescr = null;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('PACKAGE_ORDER_UNIT_QUANTITY')]
    protected ?float $packageOrderUnitQuantity = null;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('PACKAGE_QUANTITY')]
    protected ?float $packageQuantity = null;

    #[Serializer\Expose]
    #[Serializer\Type(PackageDimensions::class)]
    #[Serializer\SerializedName('PACKAGE_DIMENSIONS')]
    protected ?PackageDimensions $packageDimensions = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MEANS_OF_TRANSPORT_IDREF')]
    protected ?string $meansOfTransportIdRef = null;

    /**
     * @var Package[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('SUB_PACKAGES')]
    #[Serializer\Type('array<' . Package::class . '>')]
    #[Serializer\XmlList(entry: 'PACKAGE')]
    protected array $subPackages = [];
}
