<?php

namespace Naugrim\OpenTrans\Nodes\OrderResponse;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\AllowOrChargesFix;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;

/**
 * @implements NodeInterface<Summary>
 * @method self setAllowOrChargesFix(array|\Naugrim\OpenTrans\Nodes\AllowOrChargesFix $allowOrChargesFix)
 * @method \Naugrim\OpenTrans\Nodes\AllowOrChargesFix getAllowOrChargesFix()
 */
#[Serializer\AccessorOrder(order: 'custom', custom: ['totalItemNum', 'totalAmount', 'allowOrChargesFix'])]
class Summary implements NodeInterface
{
    use HasSerializableAttributes;
    use HasTotalItemNum;
    use HasTotalAmount;

    #[Serializer\Expose]
    #[Serializer\Type(AllowOrChargesFix::class)]
    #[Serializer\SerializedName('ALLOW_OR_CHARGES_FIX')]
    protected AllowOrChargesFix $allowOrChargesFix;
}
