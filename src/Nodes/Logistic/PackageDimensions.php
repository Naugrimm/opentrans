<?php

namespace Naugrim\OpenTrans\Nodes\Logistic;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<self>
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
