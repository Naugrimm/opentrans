<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

class AllowOrCharge implements NodeInterface
{
    use HasTypeAttribute;

    /**
     *
     * @var int
     */
    #[Serializer\Expose]
    #[Serializer\Type('int')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_SEQUENCE')]
    protected int $sequence;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_NAME')]
    protected string $name;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_TYPE')]
    protected string $type;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_DESCR')]
    protected string $description;

    /**
     *
     * @var AllowOrChargeValue
     */
    #[Serializer\Expose]
    #[Serializer\Type(AllowOrChargeValue::class)]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_VALUE')]
    protected AllowOrChargeValue $value;

    /**
     *
     * @var float
     */
    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_BASE')]
    protected float $base;

    /**
     * @return int
     */
    public function getSequence(): int
    {
        return $this->sequence;
    }

    /**
     * @param int $sequence
     * @return AllowOrCharge
     */
    public function setSequence(int $sequence): AllowOrCharge
    {
        $this->sequence = $sequence;
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
     * @return AllowOrCharge
     */
    public function setName(string $name): AllowOrCharge
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return AllowOrCharge
     */
    public function setType(string $type): AllowOrCharge
    {
        $this->type = $type;
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
     * @return AllowOrCharge
     */
    public function setDescription(string $description): AllowOrCharge
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return AllowOrChargeValue
     */
    public function getValue(): AllowOrChargeValue
    {
        return $this->value;
    }

    /**
     * @param AllowOrChargeValue $value
     * @return AllowOrCharge
     */
    public function setValue(AllowOrChargeValue $value): AllowOrCharge
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getBase(): float
    {
        return $this->base;
    }

    /**
     * @param float $base
     * @return AllowOrCharge
     */
    public function setBase(float $base): AllowOrCharge
    {
        $this->base = $base;
        return $this;
    }
}
