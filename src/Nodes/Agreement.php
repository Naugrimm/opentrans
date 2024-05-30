<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\SupplierIdRef;

/**
 * @implements NodeInterface<Agreement>
 */
class Agreement implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\SerializedName('type')]
    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    protected string $type;

    #[Serializer\Expose]
    #[Serializer\SerializedName('default')]
    #[Serializer\Type('bool')]
    #[Serializer\XmlAttribute]
    protected bool $default;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('AGREEMENT_ID')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $id;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('AGREEMENT_LINE_ID')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $lineId;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('AGREEMENT_START_DATE')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $startDate;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('AGREEMENT_END_DATE')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $endDate;

    #[Serializer\Expose]
    #[Serializer\Type(SupplierIdRef::class)]
    #[Serializer\SerializedName('SUPPLIER_IDREF')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected SupplierIdRef $supplierIdRef;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('AGREEMENT_DESCR')]
    protected string $description;

    /**
     *
     *
     * @var Mime[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('MIME_INFO')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Mime>')]
    #[Serializer\XmlList(entry: 'MIME')]
    protected array $mimeInfo = [];

    public function isDefault(): bool
    {
        return $this->default;
    }

    public function addMimeInfo(Mime $mimeInfo): Agreement
    {
        $this->mimeInfo[] = $mimeInfo;
        return $this;
    }
}
