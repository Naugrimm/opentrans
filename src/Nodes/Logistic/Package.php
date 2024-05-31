<?php

namespace Naugrim\OpenTrans\Nodes\Logistic;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Concerns\HasStringValue;
use Naugrim\BMEcat\Nodes\Contact\Details;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Crypto\PublicKey;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<self>
 */
final class Package implements NodeInterface
{
    use HasSerializableAttributes;

    /**
     * @var PackageId[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<'.PackageId::class.'>')]
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
    #[Serializer\Type('array<'.Package::class.'>')]
    #[Serializer\XmlList(entry: 'PACKAGE')]
    protected array $subPackages = [];

}
