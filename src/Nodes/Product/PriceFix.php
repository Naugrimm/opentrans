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
}
