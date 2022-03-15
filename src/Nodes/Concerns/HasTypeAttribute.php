<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasTypeAttribute
{
    use CanAssertConstantValue;

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
        $this->assertValidConstant($type);

        $this->type = $type;
        /** @var NodeInterface $this */
        return $this;
    }
}
