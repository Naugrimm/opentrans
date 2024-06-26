<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\File\HashValue;
use Naugrim\OpenTrans\Nodes\Mime\Embedded;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<Mime>
 * @method self setType(string $type)
 * @method string getType()
 * @method self setSource(string $source)
 * @method string getSource()
 * @method self setFileHashValue(\Naugrim\OpenTrans\Nodes\File\HashValue|array $fileHashValue)
 * @method Naugrim\OpenTrans\Nodes\File\HashValue[] getFileHashValue()
 * @method self setEmbedded(\Naugrim\OpenTrans\Nodes\Mime\Embedded[]|array $embedded)
 * @method \Naugrim\OpenTrans\Nodes\Mime\Embedded[]|array getEmbedded()
 * @method self setDescription(string $description)
 * @method string getDescription()
 * @method self setAlt(string $alt)
 * @method string getAlt()
 * @method self setPurpose(string $purpose)
 * @method string getPurpose()
 * @method self setOrder(int $order)
 * @method int getOrder()
 */
class Mime implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MIME_TYPE')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $type;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MIME_SOURCE')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $source;

    /**
     *
     *
     * @var HashValue[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\File\HashValue>')]
    #[Serializer\XmlList(entry: 'FILE_HASH_VALUE', inline: true)]
    protected array $fileHashValue = [];

    /**
     *
     *
     * @var Embedded[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('MIME_EMBEDDED')]
    #[Serializer\Type('array<' . Embedded::class . '>')]
    #[Serializer\XmlList(entry: 'MIME_EMBEDDED')]
    protected array $embedded = [];

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MIME_DESCR')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
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
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
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
