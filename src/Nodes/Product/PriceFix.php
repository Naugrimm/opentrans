<?php

namespace Naugrim\OpenTrans\Nodes\Product;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\AllowOrChargesFix;
use Naugrim\OpenTrans\Nodes\Tax\DetailsFix;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<PriceFix>
 * @method self setAmount(float $amount)
 * @method float getAmount()
 * @method self setAllowOrChargesFix(null|array|\Naugrim\OpenTrans\Nodes\AllowOrChargesFix $allowOrChargesFix)
 * @method \Naugrim\OpenTrans\Nodes\AllowOrChargesFix|null getAllowOrChargesFix()
 * @method self setTax(\Naugrim\OpenTrans\Nodes\Tax\DetailsFix[]|array $tax)
 * @method \Naugrim\OpenTrans\Nodes\Tax\DetailsFix[]|array getTax()
 * @method self setPriceQuantity(float|null $priceQuantity)
 * @method float|null getPriceQuantity()
 */
class PriceFix implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('PRICE_AMOUNT')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected float $amount;

    #[Serializer\Expose]
    #[Serializer\Type(AllowOrChargesFix::class)]
    #[Serializer\SerializedName('ALLOW_OR_CHARGES_FIX')]
    protected ?AllowOrChargesFix $allowOrChargesFix = null;

    /**
     * @var DetailsFix[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('TAX_DETAILS_FIX')]
    #[Serializer\Type('array<' . DetailsFix::class . '>')]
    #[Serializer\XmlList(entry: 'TAX_DETAILS_FIX', inline: true)]
    protected array $tax = [];

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('PRICE_QUANTITY')]
    #[Serializer\XmlElement(cdata: false, namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?float $priceQuantity = null;

    /**
     * @return DetailsFix[]
     */
    private function getTaxSequence(): array
    {
        $taxes = $this->getTax();
        usort($taxes, static fn (DetailsFix $left, DetailsFix $right): int => ($left->getCalculationSequence() ?? 1) - ($right->getCalculationSequence() ?? 1));

        return $taxes;
    }

    public function finalPriceIncludingTaxes(): float
    {
        $finalPrice = $this->amount;

        // @TODO: Handle $allowOrChargesFix

        foreach ($this->getTaxSequence() as $tax) {
            /**
             * prefer using the amount over the tax percentage.
             * both should lead to the same result, but... rounding issues
             */
            if ($tax->getAmount() !== null) {
                $finalPrice += $tax->getAmount();
            } elseif ($tax->getTax() !== null) {
                $finalPrice += round($finalPrice * ($tax->getTax() ?? 0), 2);
            }
        }

        return $finalPrice;
    }
}
