<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class AllowOrChargesFix implements NodeInterface
{
    /**
     *
     * @var AllowOrCharge
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\AllowOrCharge::class)]
    #[Serializer\SerializedName('ALLOW_OR_CHARGE')]
    protected \Naugrim\OpenTrans\Nodes\AllowOrCharge $allowOrCharge;

    /**
     *
     * @var float
     */
    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('ALLOW_OR_CHARGES_TOTAL_AMOUNT')]
    protected float $allowOrChargesTotalAmount;

    /**
     * @return AllowOrCharge
     */
    public function getAllowOrCharge(): AllowOrCharge
    {
        return $this->allowOrCharge;
    }

    /**
     * @param AllowOrCharge $allowOrCharge
     * @return AllowOrChargesFix
     */
    public function setAllowOrCharge(AllowOrCharge $allowOrCharge): AllowOrChargesFix
    {
        $this->allowOrCharge = $allowOrCharge;
        return $this;
    }

    /**
     * @return float
     */
    public function getAllowOrChargesTotalAmount(): float
    {
        return $this->allowOrChargesTotalAmount;
    }

    /**
     * @param float $allowOrChargesTotalAmount
     * @return AllowOrChargesFix
     */
    public function setAllowOrChargesTotalAmount(float $allowOrChargesTotalAmount): AllowOrChargesFix
    {
        $this->allowOrChargesTotalAmount = $allowOrChargesTotalAmount;
        return $this;
    }
}
