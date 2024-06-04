<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Catalog\Reference;

/**
 * @implements NodeInterface<SourcingInfo>
 * @method self setQuotationId(string $quotationId)
 * @method string getQuotationId()
 * @method self setAgreement(array|\Naugrim\OpenTrans\Nodes\Agreement $agreement)
 * @method \Naugrim\OpenTrans\Nodes\Agreement getAgreement()
 * @method self setCatalogReference(array|\Naugrim\OpenTrans\Nodes\Catalog\Reference $catalogReference)
 * @method \Naugrim\OpenTrans\Nodes\Catalog\Reference getCatalogReference()
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
