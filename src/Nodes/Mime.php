<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\File\HashValue;
use Naugrim\OpenTrans\Nodes\Mime\Embedded;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<Mime>
 */
class Mime implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:MIME_TYPE')]
    protected string $type;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:MIME_SOURCE')]
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

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:MIME_DESCR')]
    protected string $description;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MIME_ALT')]
    protected string $alt;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MIME_PURPOSE')]
    protected string $purpose;

    /**
     *
     * @var int
     */
    #[Serializer\Expose]
    #[Serializer\Type('int')]
    #[Serializer\SerializedName('MIME_ORDER')]
    protected int $order;

    /**
     * @param HashValue $fileHashValue
     * @return Mime
     */
    public function addFileHashValue(HashValue $fileHashValue): Mime
    {
        $this->fileHashValue[] = $fileHashValue;
        return $this;
    }

    /**
     * @param Embedded $embedded
     * @return Mime
     */
    public function addEmbedded(Embedded $embedded): Mime
    {
        $this->embedded[] = $embedded;
        return $this;
    }
}
