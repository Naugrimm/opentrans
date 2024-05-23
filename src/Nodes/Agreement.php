<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\SupplierIdRef;

class Agreement implements NodeInterface
{
    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('type')]
    #[Serializer\XmlAttribute]
    protected string $type;

    /**
     *
     * @var bool
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('default')]
    #[Serializer\XmlAttribute]
    protected bool $default;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:AGREEMENT_ID')]
    protected string $id;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:AGREEMENT_LINE_ID')]
    protected string $lineId;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:AGREEMENT_START_DATE')]
    protected string $startDate;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:AGREEMENT_END_DATE')]
    protected string $endDate;

    /**
     *
     * @var SupplierIdRef
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\BMEcat\Nodes\SupplierIdRef::class)]
    #[Serializer\SerializedName('bme:SUPPLIER_IDREF')]
    protected \Naugrim\BMEcat\Nodes\SupplierIdRef $supplierIdRef;

    /**
     *
     * @var string
     */
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

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Agreement
     */
    public function setType(string $type): Agreement
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @param bool $default
     * @return Agreement
     */
    public function setDefault(bool $default): Agreement
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Agreement
     */
    public function setId(string $id): Agreement
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLineId(): string
    {
        return $this->lineId;
    }

    /**
     * @param string $lineId
     * @return Agreement
     */
    public function setLineId(string $lineId): Agreement
    {
        $this->lineId = $lineId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return Agreement
     */
    public function setStartDate(string $startDate): Agreement
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     * @return Agreement
     */
    public function setEndDate(string $endDate): Agreement
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return SupplierIdRef
     */
    public function getSupplierIdRef(): SupplierIdRef
    {
        return $this->supplierIdRef;
    }

    /**
     * @param SupplierIdRef $supplierIdRef
     * @return Agreement
     */
    public function setSupplierIdRef(SupplierIdRef $supplierIdRef): Agreement
    {
        $this->supplierIdRef = $supplierIdRef;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Agreement
     */
    public function setDescription(string $description): Agreement
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Mime[]
     */
    public function getMimeInfo(): array
    {
        return $this->mimeInfo;
    }

    /**
     * @param Mime[] $mimeInfos
     * @return Agreement
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setMimeInfo(array $mimeInfos): Agreement
    {
        $this->mimeInfo = [];

        foreach ($mimeInfos as $mimeInfo) {
            if (!$mimeInfo instanceof Mime) {
                $mimeInfo = NodeBuilder::fromArray($mimeInfo, new Mime());
            }

            $this->addMimeInfo($mimeInfo);
        }

        return $this;
    }

    /**
     * @param Mime $mimeInfo
     * @return Agreement
     */
    public function addMimeInfo(Mime $mimeInfo): Agreement
    {
        $this->mimeInfo[] = $mimeInfo;
        return $this;
    }
}
