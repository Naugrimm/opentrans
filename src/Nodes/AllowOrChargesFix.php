<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class AllowOrChargesFix implements NodeInterface
{
    use \Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
    /**
     *
     * @var AllowOrCharge
     */
    #[Serializer\Expose]
    #[Serializer\Type(AllowOrCharge::class)]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE')]
    protected AllowOrCharge $allowOrCharge;

    /**
     *
     * @var float
     */
    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGES_TOTAL_AMOUNT')]
    protected float $allowOrChargesTotalAmount;
}
