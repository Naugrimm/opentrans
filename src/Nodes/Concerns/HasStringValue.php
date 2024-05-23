<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasStringValue
{
    /**
     * @var string
     */
    #[Serializer\XmlValue]
    protected $value;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return NodeInterface
     */
    public function setValue(string $value): NodeInterface
    {
        $this->value = $value;
        /** @var NodeInterface $this */
        return $this;
    }
}
