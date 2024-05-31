<?php

namespace Naugrim\OpenTrans\Nodes\Product;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Tax\DetailsFix;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<PriceFix>
 */
class PriceFix implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('PRICE_AMOUNT')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected float $amount;

    /**
     * @var DetailsFix[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('TAX_DETAILS_FIX')]
    #[Serializer\Type('array<'.DetailsFix::class.'>')]
    #[Serializer\XmlList(entry: 'TAX_DETAILS_FIX', inline: true)]
    protected array $tax = [];
}
