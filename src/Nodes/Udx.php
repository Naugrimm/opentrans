<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Stringable;

class Udx implements UdxInterface, Stringable
{
    #[Serializer\Exclude]
    protected string $vendor;

    #[Serializer\Exclude]
    protected string $name;

    #[Serializer\Type('string')]
    #[Serializer\Inline]
    protected string $value;

    public function getVendor(): string
    {
        return $this->vendor;
    }

    public function setVendor(string $vendor): Udx
    {
        $this->vendor = $vendor;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Udx
    {
        $this->name = $name;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): Udx
    {
        $this->value = $value;
        return $this;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}
