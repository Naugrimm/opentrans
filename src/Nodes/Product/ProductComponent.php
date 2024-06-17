<?php

namespace Naugrim\OpenTrans\Nodes\Product;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\XmlElement;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\ProductId;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<PriceFix>
 * @method self setProductId(array|\Naugrim\OpenTrans\Nodes\ProductId $productId)
 * @method \Naugrim\OpenTrans\Nodes\ProductId getProductId()
 * @method self setProductComponents(\Naugrim\OpenTrans\Nodes\Product\ProductComponent[]|array $productComponents)
 * @method \Naugrim\OpenTrans\Nodes\Product\ProductComponent[]|array getProductComponents()
 * @method self setQuantity(float $quantity)
 * @method float getQuantity()
 * @method self setOrderUnit(string $orderUnit)
 * @method string getOrderUnit()
 * @method self setPriceFix(array|\Naugrim\OpenTrans\Nodes\Product\PriceFix $priceFix)
 * @method \Naugrim\OpenTrans\Nodes\Product\PriceFix getPriceFix()
 */
class ProductComponent implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(ProductId::class)]
    #[Serializer\SerializedName('PRODUCT_ID')]
    protected ProductId $productId;

    /**
     * @var ProductComponent[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . ProductComponent::class . '>')]
    #[Serializer\SerializedName('PRODUCT_COMPONENTS')]
    #[Serializer\XmlList(entry: 'PRODUCT_COMPONENT')]
    protected array $productComponents = [];

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('QUANTITY')]
    protected float $quantity;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_UNIT')]
    #[XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $orderUnit;

    #[Serializer\Expose]
    #[Serializer\Type(PriceFix::class)]
    #[Serializer\SerializedName('PRODUCT_PRICE_FIX')]
    protected PriceFix $priceFix;
}
