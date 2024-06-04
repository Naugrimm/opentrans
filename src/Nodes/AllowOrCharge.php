<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @implements NodeInterface<AllowOrCharge>
 * @method self setSequence(int|null $sequence)
 * @method int|null getSequence()
 * @method self setName(string|null $name)
 * @method string|null getName()
 * @method self setAllowOrChargeType(string|null $allowOrChargeType)
 * @method string|null getAllowOrChargeType()
 * @method self setDescription(string|null $description)
 * @method string|null getDescription()
 * @method self setValue(null|array|\Naugrim\OpenTrans\Nodes\AllowOrChargeValue $value)
 * @method \Naugrim\OpenTrans\Nodes\AllowOrChargeValue|null getValue()
 * @method self setBase(float|null $base)
 * @method float|null getBase()
 */
class AllowOrCharge implements NodeInterface
{
    use HasSerializableAttributes;

    /**
     * @use HasTypeAttribute<self>
     */
    use HasTypeAttribute;

    #[Serializer\Expose]
    #[Serializer\Type('int')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_SEQUENCE')]
    protected ?int $sequence = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_NAME')]
    protected ?string $name = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_TYPE')]
    protected ?string $allowOrChargeType = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_DESCR')]
    protected ?string $description = null;

    #[Serializer\Expose]
    #[Serializer\Type(AllowOrChargeValue::class)]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_VALUE')]
    protected ?AllowOrChargeValue $value = null;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE_BASE')]
    protected ?float $base = null;
}
