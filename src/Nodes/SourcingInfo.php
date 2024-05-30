<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Catalog\Reference;

class SourcingInfo implements NodeInterface
{
    use \Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('QUOTATION_ID')]
    protected string $quotationId;

    /**
     *
     * @var Agreement
     */
    #[Serializer\Expose]
    #[Serializer\Type(Agreement::class)]
    #[Serializer\SerializedName('AGREEMENT')]
    protected Agreement $agreement;

    /**
     *
     * @var Reference
     */
    #[Serializer\Expose]
    #[Serializer\Type(Reference::class)]
    #[Serializer\SerializedName('CATALOG_REFERENCE')]
    protected Reference $catalogReference;
}
