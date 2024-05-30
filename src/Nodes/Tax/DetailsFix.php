<?php

namespace Naugrim\OpenTrans\Nodes\Tax;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<DetailsFix>
 */
class DetailsFix implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type('int')]
    #[Serializer\SerializedName('CALCULATION_SEQUENCE')]
    protected int $calculationSequence;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('TAX_CATEGORY')]
    protected string $category;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('TAX_TYPE')]
    protected string $type;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('TAX')]
    protected float $tax;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('TAX_AMOUNT')]
    protected float $amount;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('TAX_BASE')]
    protected float $base;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('EXEMPTION_REASON')]
    protected string $exemptionReason;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('JURISDICTION')]
    protected string $jurisdiction;
}
