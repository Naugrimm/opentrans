<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @implements NodeInterface<AllowOrCharge>
 */
class AllowOrCharge implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     * @use HasTypeAttribute<self>
     */
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
}
