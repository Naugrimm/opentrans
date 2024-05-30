<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\File\HashValue;
use Naugrim\OpenTrans\Nodes\Mime\Embedded;

/**
 * @implements NodeInterface<Mime>
 */
class Mime implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MIME_TYPE')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $type;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MIME_SOURCE')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $source;

    /**
     *
     *
     * @var HashValue[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('FILE_HASH_VALUE')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\File\HashValue>')]
    #[Serializer\XmlList(inline: true)]
    protected array $fileHashValue = [];

    /**
     *
     *
     * @var Embedded[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('MIME_EMBEDDED')]
    #[Serializer\Type('array<\Naugrim\OpenTrans\Nodes\Mime\Embedded>')]
    #[Serializer\XmlList(entry: 'MIME_EMBEDDED')]
    protected array $embedded = [];

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MIME_DESCR')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $description;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MIME_ALT')]
    protected string $alt;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MIME_PURPOSE')]
    protected string $purpose;

    #[Serializer\Expose]
    #[Serializer\Type('int')]
    #[Serializer\SerializedName('MIME_ORDER')]
    protected int $order;

    public function addFileHashValue(HashValue $fileHashValue): Mime
    {
        $this->fileHashValue[] = $fileHashValue;
        return $this;
    }

    public function addEmbedded(Embedded $embedded): Mime
    {
        $this->embedded[] = $embedded;
        return $this;
    }
}
