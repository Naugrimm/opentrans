<?php

namespace Naugrim\OpenTrans\Nodes\OrderResponse;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\AllowOrChargesFix;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;

/**
 * @Serializer\AccessorOrder("custom", custom = {"totalItemNum", "totalAmount", "allowOrChargesFix"})
 */
class Summary implements NodeInterface
{
    use HasTotalItemNum, HasTotalAmount;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\AllowOrChargesFix")
     * @Serializer\SerializedName("ALLOW_OR_CHARGES_FIX")
     *
     * @var AllowOrChargesFix
     */
    protected $allowOrChargesFix;

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
