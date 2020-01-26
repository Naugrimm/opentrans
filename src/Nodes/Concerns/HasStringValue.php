<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use Naugrim\OpenTrans\Nodes\NodeInterface;

trait HasStringValue
{
    /**
     * @Serializer\XmlValue
     * @var string
     */
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
