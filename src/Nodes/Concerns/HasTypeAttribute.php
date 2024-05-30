<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasTypeAttribute
{
    use CanAssertConstantValue;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('type')]
    #[Serializer\XmlAttribute]
    protected string $type;

    /**
     * @param string $type
     * @return NodeInterface
     */
    public function setType(string $type): NodeInterface
    {
        self::assertValidConstant($type);

        $this->type = $type;
        return $this;
    }
}
