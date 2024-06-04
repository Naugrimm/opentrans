<?php

namespace Naugrim\OpenTrans\Nodes\Product;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\ProductId;

/**
 * @implements NodeInterface<PriceFix>
 * @method self setAmount(array|\Naugrim\OpenTrans\Nodes\ProductId $amount)
 * @method \Naugrim\OpenTrans\Nodes\ProductId getAmount()
 * @method self setQuantity(float $quantity)
 * @method float getQuantity()
 * @method self setOrderUnit(string $orderUnit)
 * @method string getOrderUnit()
 */
class ProductComponent implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(ProductId::class)]
    #[Serializer\SerializedName('PRODUCT_ID')]
    protected ProductId $amount;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('QUANTITY')]
    protected float $quantity;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_UNIT')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $orderUnit;
}
