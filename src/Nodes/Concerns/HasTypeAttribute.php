<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasTypeAttribute
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return NodeInterface
     */
    public function setType(string $type): NodeInterface
    {
        $this->type = $type;
        /** @var NodeInterface $this */
        return $this;
    }
}
