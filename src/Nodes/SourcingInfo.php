<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Catalog\Reference;

/**
 * @implements NodeInterface<SourcingInfo>
 */
class SourcingInfo implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('QUOTATION_ID')]
    protected string $quotationId;

    #[Serializer\Expose]
    #[Serializer\Type(Agreement::class)]
    #[Serializer\SerializedName('AGREEMENT')]
    protected Agreement $agreement;

    #[Serializer\Expose]
    #[Serializer\Type(Reference::class)]
    #[Serializer\SerializedName('CATALOG_REFERENCE')]
    protected Reference $catalogReference;
}
