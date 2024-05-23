<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasUdxItems;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\Party;
use Naugrim\OpenTrans\Nodes\Payment\Payment;
use Naugrim\OpenTrans\Nodes\UdxAggregate;

class Info implements NodeInterface
{
    use HasUdxItems;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_ID')]
    protected string $id;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_DATE')]
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
     * @var PartiesReference
     */
    #[Serializer\Expose]
    #[Serializer\Type(PartiesReference::class)]
    #[Serializer\SerializedName('ORDER_PARTIES_REFERENCE')]
    protected PartiesReference $partiesReference;

    /**
     *
     * @var boolean
     */
    #[Serializer\Expose]
    #[Serializer\Type('bool')]
    #[Serializer\SerializedName('PARTIAL_SHIPMENT_ALLOWED')]
    protected bool $partialShipmentAllowed;

    /**
     *
     * @var Payment
     */
    #[Serializer\Type(Payment::class)]
    #[Serializer\SerializedName('PAYMENT')]
    protected Payment $payment;

    /**
     * @see HasUdxItems::$udxItem
     * @var UdxAggregate
     */
    #[Serializer\SerializedName('HEADER_UDX')]
    protected UdxAggregate $udxItem;

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
     * @return PartiesReference
     */
    public function getPartiesReference(): PartiesReference
    {
        return $this->partiesReference;
    }

    /**
     * @param PartiesReference $partiesReference
     * @return Info
     */
    public function setPartiesReference(PartiesReference $partiesReference): Info
    {
        $this->partiesReference = $partiesReference;
        return $this;
    }

    public function setPartialShipmentAllowed(bool $partialShipmentAllowed): self
    {
        $this->partialShipmentAllowed = $partialShipmentAllowed;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPartialShipmentAllowed(): bool
    {
        return $this->partialShipmentAllowed;
    }

    public function getPayment(): Payment
    {
        return $this->payment;
    }

    public function setPayment(Payment $payment): Info
    {
        $this->payment = $payment;
        return $this;
    }
}
