<?php

namespace Naugrim\OpenTrans\Nodes\Tax;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class DetailsFix implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("int")
     * @Serializer\SerializedName("CALCULATION_SEQUENCE")
     *
     * @var int
     */
    protected $calculationSequence;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TAX_CATEGORY")
     *
     * @var string
     */
    protected $category;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TAX_TYPE")
     *
     * @var string
     */
    protected $type;

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TAX")
     *
     * @var float
     */
    protected $tax;

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TAX_AMOUNT")
     *
     * @var float
     */
    protected $amount;

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TAX_BASE")
     *
     * @var float
     */
    protected $base;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EXEMPTION_REASON")
     *
     * @var string
     */
    protected $exemptionReason;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("JURISDICTION")
     *
     * @var string
     */
    protected $jurisdiction;

    /**
     * @return int
     */
    public function getCalculationSequence(): int
    {
        return $this->calculationSequence;
    }

    /**
     * @param int $calculationSequence
     * @return DetailsFix
     */
    public function setCalculationSequence(int $calculationSequence): DetailsFix
    {
        $this->calculationSequence = $calculationSequence;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return DetailsFix
     */
    public function setCategory(string $category): DetailsFix
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return DetailsFix
     */
    public function setType(string $type): DetailsFix
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function getTax(): float
    {
        return $this->tax;
    }

    /**
     * @param float $tax
     * @return DetailsFix
     */
    public function setTax(float $tax): DetailsFix
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return DetailsFix
     */
    public function setAmount(float $amount): DetailsFix
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getBase(): float
    {
        return $this->base;
    }

    /**
     * @param float $base
     * @return DetailsFix
     */
    public function setBase(float $base): DetailsFix
    {
        $this->base = $base;
        return $this;
    }

    /**
     * @return string
     */
    public function getExemptionReason(): string
    {
        return $this->exemptionReason;
    }

    /**
     * @param string $exemptionReason
     * @return DetailsFix
     */
    public function setExemptionReason(string $exemptionReason): DetailsFix
    {
        $this->exemptionReason = $exemptionReason;
        return $this;
    }

    /**
     * @return string
     */
    public function getJurisdiction(): string
    {
        return $this->jurisdiction;
    }

    /**
     * @param string $jurisdiction
     * @return DetailsFix
     */
    public function setJurisdiction(string $jurisdiction): DetailsFix
    {
        $this->jurisdiction = $jurisdiction;
        return $this;
    }
}
