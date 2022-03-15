<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;

class Udx implements UdxInterface
{
    /**
     * @Serializer\Exclude
     * @var string
     */
    protected $vendor;

    /**
     * @Serializer\Exclude
     * @var string
     */
    protected $name;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Inline
     */
    protected $value;

    /**
     * @return string
     */
    public function getVendor(): string
    {
        return $this->vendor;
    }

    /**
     * @param string $vendor
     * @return Udx
     */
    public function setVendor(string $vendor): Udx
    {
        $this->vendor = $vendor;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Udx
     */
    public function setName(string $name): Udx
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Udx
     */
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
