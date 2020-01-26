<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use Naugrim\OpenTrans\Nodes\NodeInterface;

trait HasContentTypeAttribute
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("contentType")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected $contentType;

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     * @return NodeInterface
     */
    public function setContentType(string $contentType): NodeInterface
    {
        $this->contentType = $contentType;
        /** @var NodeInterface $this */
        return $this;
    }
}
