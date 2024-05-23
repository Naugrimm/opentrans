<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Catalog\Reference;

class SourcingInfo implements NodeInterface
{
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

    /**
     * @return string
     */
    public function getQuotationId(): string
    {
        return $this->quotationId;
    }

    /**
     * @param string $quotationId
     * @return SourcingInfo
     */
    public function setQuotationId(string $quotationId): SourcingInfo
    {
        $this->quotationId = $quotationId;
        return $this;
    }

    /**
     * @return Agreement
     */
    public function getAgreement(): Agreement
    {
        return $this->agreement;
    }

    /**
     * @param Agreement $agreement
     * @return SourcingInfo
     */
    public function setAgreement(Agreement $agreement): SourcingInfo
    {
        $this->agreement = $agreement;
        return $this;
    }

    /**
     * @return Catalog\Reference
     */
    public function getCatalogReference(): Catalog\Reference
    {
        return $this->catalogReference;
    }

    /**
     * @param Catalog\Reference $catalogReference
     * @return SourcingInfo
     */
    public function setCatalogReference(Catalog\Reference $catalogReference): SourcingInfo
    {
        $this->catalogReference = $catalogReference;
        return $this;
    }
}
