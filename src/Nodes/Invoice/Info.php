<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\Party;

class Info implements NodeInterface
{
    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('INVOICE_ID')]
    protected string $id;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('INVOICE_DATE')]
    protected string $date;

    /**
     *
     * @var DeliveryDate
     */
    #[Serializer\Expose]
    #[Serializer\Type(DeliveryDate::class)]
    #[Serializer\SerializedName('DELIVERY_DATE')]
    protected DeliveryDate $deliveryDate;

    /**
     *
     *
     * @var Party[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('PARTIES')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Party>')]
    #[Serializer\XmlList(entry: 'PARTY')]
    protected array $parties = [];

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('INVOICE_ISSUER_IDREF')]
    protected string $issuerIdRef;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('INVOICE_RECIPIENT_IDREF')]
    protected string $rcptIdRef;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:CURRENCY')]
    protected string $currency;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Info
     */
    public function setId(string $id): Info
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Info
     */
    public function setDate(string $date): Info
    {
        $this->date = $date;
        return $this;
    }

    public function getDeliveryDate(): DeliveryDate
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(DeliveryDate $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * @return Party[]
     */
    public function getParties(): array
    {
        return $this->parties;
    }

    /**
     * @param Party[] $parties
     * @return Info
     */
    public function setParties(array $parties): Info
    {
        foreach ($parties as $party) {
            if (!$party instanceof Party) {
                $party = NodeBuilder::fromArray($party, new Party());
            }

            $this->addParty($party);
        }

        return $this;
    }

    /**
     * @param Party $party
     * @return $this
     */
    public function addParty(Party $party): static
    {
        $this->parties[] = $party;
        return $this;
    }

    /**
     * @return string
     */
    public function getIssuerIdRef(): string
    {
        return $this->issuerIdRef;
    }

    /**
     * @param string $issuerIdRef
     * @return Info
     */
    public function setIssuerIdRef(string $issuerIdRef): Info
    {
        $this->issuerIdRef = $issuerIdRef;
        return $this;
    }

    /**
     * @return string
     */
    public function getRcptIdRef(): string
    {
        return $this->rcptIdRef;
    }

    /**
     * @param string $rcptIdRef
     * @return Info
     */
    public function setRcptIdRef(string $rcptIdRef): Info
    {
        $this->rcptIdRef = $rcptIdRef;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Info
     */
    public function setCurrency(string $currency): Info
    {
        $this->currency = $currency;
        return $this;
    }
}
