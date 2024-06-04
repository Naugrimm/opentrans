<?php

namespace Naugrim\OpenTrans\Nodes\Logistic;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<self>
 * @method self setVolume(float|null $volume)
 * @method float|null getVolume()
 * @method self setWeight(float|null $weight)
 * @method float|null getWeight()
 * @method self setLength(float|null $length)
 * @method float|null getLength()
 * @method self setWidth(float|null $width)
 * @method float|null getWidth()
 * @method self setDepth(float|null $depth)
 * @method float|null getDepth()
 */
final class PackageDimensions implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('VOLUME')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected ?float $volume = null;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('WEIGHT')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected ?float $weight = null;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('LENGTH')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected ?float $length = null;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('WIDTH')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected ?float $width = null;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('DEPTH')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected ?float $depth = null;
}
