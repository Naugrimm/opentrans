<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Agreement;
use Naugrim\OpenTrans\Nodes\Catalog\Reference;

/**
 * @implements NodeInterface<OrderReference>
 * @method self setOrderId(string $orderId)
 * @method string getOrderId()
 * @method self setLineItemId(string $lineItemId)
 * @method string getLineItemId()
 * @method self setOrderDate(null|array|\DateTimeInterface $orderDate)
 * @method \DateTimeInterface|null getOrderDate()
 * @method self setOrderDescription(string $orderDescription)
 * @method string getOrderDescription()
 * @method self setAgreement(\Naugrim\OpenTrans\Nodes\Agreement[]|array $agreement)
 * @method \Naugrim\OpenTrans\Nodes\Agreement[]|array getAgreement()
 * @method self setCatalogReference(null|array|\Naugrim\OpenTrans\Nodes\Catalog\Reference $catalogReference)
 * @method \Naugrim\OpenTrans\Nodes\Catalog\Reference|null getCatalogReference()
 */
class OrderReference implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_ID')]
    protected string $orderId;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('LINE_ITEM_ID')]
    protected string $lineItemId;

    #[Serializer\Expose]
    #[Serializer\Type(DateTimeInterface::class . "<'Y-m-d\\TH:i:s', '', ['Y-m-d\\TH:i:s', 'Y-m-d\\TH:i:sP']>")]
    #[Serializer\SerializedName('ORDER_DATE')]
    protected ?DateTimeInterface $orderDate = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_DESCR')]
    protected string $orderDescription;

    /**
     * @var Agreement[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Agreement::class . '>')]
    #[Serializer\XmlList(entry: 'AGREEMENT', inline: true)]
    protected array $agreement = [];

    #[Serializer\Expose]
    #[Serializer\Type(Reference::class)]
    #[Serializer\SerializedName('CATALOG_REFERENCE')]
    protected ?Reference $catalogReference = null;
}
