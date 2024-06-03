<?php

namespace Naugrim\OpenTrans\Nodes\Logistic;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Concerns\HasStringValue;
use Naugrim\BMEcat\Nodes\Contact\Details;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Crypto\PublicKey;

/**
 * @implements NodeInterface<Transport>
 */
final class Transport implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('INCOTERM')]
    #[Serializer\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $incoterm;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LOCATION')]
    #[Serializer\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $location = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('TRANSPORT_REMARK')]
    #[Serializer\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $transportRemark = null;
}
