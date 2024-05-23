<?php

namespace Naugrim\OpenTrans\Nodes\OrderResponse;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\AllowOrChargesFix;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;

#[Serializer\AccessorOrder(order: 'custom', custom: ['totalItemNum', 'totalAmount', 'allowOrChargesFix'])]
class Summary implements NodeInterface
{
    use HasTotalItemNum;
    use HasTotalAmount;

    /**
     *
     * @var AllowOrChargesFix
     */
    #[Serializer\Expose]
    #[Serializer\Type(AllowOrChargesFix::class)]
    #[Serializer\SerializedName('ALLOW_OR_CHARGES_FIX')]
    protected AllowOrChargesFix $allowOrChargesFix;

    /**
     * @return AllowOrChargesFix
     */
    public function getAllowOrChargesFix(): AllowOrChargesFix
    {
        return $this->allowOrChargesFix;
    }

    /**
     * @param AllowOrChargesFix $allowOrChargesFix
     * @return Summary
     */
    public function setAllowOrChargesFix(AllowOrChargesFix $allowOrChargesFix): Summary
    {
        $this->allowOrChargesFix = $allowOrChargesFix;
        return $this;
    }
}
