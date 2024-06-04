<?php

namespace Naugrim\OpenTrans\Nodes\Tax;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<DetailsFix>
 * @method self setCalculationSequence(int $calculationSequence)
 * @method int getCalculationSequence()
 * @method self setCategory(string $category)
 * @method string getCategory()
 * @method self setType(string $type)
 * @method string getType()
 * @method self setTax(float $tax)
 * @method float getTax()
 * @method self setAmount(float $amount)
 * @method float getAmount()
 * @method self setBase(float $base)
 * @method float getBase()
 * @method self setExemptionReason(string $exemptionReason)
 * @method string getExemptionReason()
 * @method self setJurisdiction(string $jurisdiction)
 * @method string getJurisdiction()
 */
class DetailsFix implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('int')]
    #[Serializer\SerializedName('CALCULATION_SEQUENCE')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected int $calculationSequence;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('TAX_CATEGORY')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $category;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('TAX_TYPE')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $type;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('TAX')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
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
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $exemptionReason;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('JURISDICTION')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $jurisdiction;
}
