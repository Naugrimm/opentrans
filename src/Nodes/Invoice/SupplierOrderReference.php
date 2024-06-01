<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Agreement;
use Naugrim\OpenTrans\Nodes\Catalog\Reference;

/**
 * @implements NodeInterface<SupplierOrderReference>
 */
class SupplierOrderReference implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('SUPPLIER_ORDER_ID')]
    protected string $orderId;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('SUPPLIER_ORDER_ITEM_ID')]
    protected string $itemId;
}