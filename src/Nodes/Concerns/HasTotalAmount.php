<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;

trait HasTotalAmount
{
    #[Serializer\Expose]
    #[Serializer\SerializedName('TOTAL_AMOUNT')]
    #[Serializer\Type('float')]
    protected float $totalAmount;
}
