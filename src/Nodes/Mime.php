<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\File\HashValue;
use Naugrim\OpenTrans\Nodes\Mime\Embedded;

class Mime implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:MIME_TYPE")
     *
     * @var string
     */
    protected $type;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:MIME_SOURCE")
     *
     * @var string
     */
    protected $source;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("FILE_HASH_VALUE")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\File\HashValue>")
     * @Serializer\XmlList(inline = true)
     *
     * @var HashValue[]
     */
    protected $fileHashValue = [];

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("MIME_EMBEDDED")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Mime\Embedded>")
     * @Serializer\XmlList(entry = "MIME_EMBEDDED")
     *
     * @var Embedded[]
     */
    protected $embedded = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:MIME_DESCR")
     *
     * @var string
     */
    protected $description;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_ALT")
     *
     * @var string
     */
    protected $alt;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_PURPOSE")
     *
     * @var string
     */
    protected $purpose;

    /**
     * @Serializer\Expose
     * @Serializer\Type("int")
     * @Serializer\SerializedName("MIME_ORDER")
     *
     * @var int
     */
    protected $order;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Mime
     */
    public function setType(string $type): Mime
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return Mime
     */
    public function setSource(string $source): Mime
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return HashValue[]
     */
    public function getFileHashValue(): array
    {
        return $this->fileHashValue;
    }

    /**
     * @param array $fileHashValues
     * @return Mime
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setFileHashValue(array $fileHashValues): Mime
    {
        $this->fileHashValue = [];
        foreach ($fileHashValues as $fileHashValue) {
            if (!$fileHashValue instanceof HashValue) {
                $fileHashValue = NodeBuilder::fromArray($fileHashValue, new HashValue());
            }
            $this->addFileHashValue($fileHashValue);
        }
        return $this;
    }

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
     * @return Embedded[]
     */
    public function getEmbedded(): array
    {
        return $this->embedded;
    }

    /**
     * @param Embedded[] $embeddeds
     * @return Mime
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setEmbedded(array $embeddeds): Mime
    {
        $this->embedded = [];
        foreach ($embeddeds as $embedded) {
            if (!$embedded instanceof Embedded) {
                $embedded = NodeBuilder::fromArray($embedded, new Embedded());
            }
            $this->addEmbedded($embedded);
        }
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

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Mime
     */
    public function setDescription(string $description): Mime
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     * @return Mime
     */
    public function setAlt(string $alt): Mime
    {
        $this->alt = $alt;
        return $this;
    }

    /**
     * @return string
     */
    public function getPurpose(): string
    {
        return $this->purpose;
    }

    /**
     * @param string $purpose
     * @return Mime
     */
    public function setPurpose(string $purpose): Mime
    {
        $this->purpose = $purpose;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return Mime
     */
    public function setOrder(int $order): Mime
    {
        $this->order = $order;
        return $this;
    }
}
