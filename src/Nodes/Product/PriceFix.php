<?php

namespace Naugrim\OpenTrans\Nodes\Product;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<PriceFix>
 */
class PriceFix implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('PRICE_AMOUNT')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected float $amount;
}
