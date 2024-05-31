<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<AllowOrChargesFix>
 */
class AllowOrChargesFix implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('array<'.AllowOrCharge::class.'>')]
    #[Serializer\XmlList(entry: 'ALLOW_OR_CHARGE', inline: true)]
    protected array $allowOrCharge = [];

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGES_TOTAL_AMOUNT')]
    protected float $allowOrChargesTotalAmount;
}
