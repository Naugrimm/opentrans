<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Language;
use Naugrim\OpenTrans\Nodes\Concerns\HasUdxItems;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\DocExchangePartiesReference;
use Naugrim\OpenTrans\Nodes\Logistic\Transport;
use Naugrim\OpenTrans\Nodes\Party;
use Naugrim\OpenTrans\Nodes\Payment\Payment;
use Naugrim\OpenTrans\Nodes\Remarks;
use Naugrim\OpenTrans\Nodes\Udx;
use Naugrim\OpenTrans\Nodes\UdxInterface;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<Info>
 * @method self setId(string $id)
 * @method string getId()
 * @method self setDate(string $date)
 * @method string getDate()
 * @method self setLanguage(\Naugrim\BMEcat\Nodes\Language[]|array<string, mixed> $language)
 * @method \Naugrim\BMEcat\Nodes\Language[] getLanguage()
 * @method self setDeliveryDate(array<string, mixed>|\Naugrim\OpenTrans\Nodes\DeliveryDate $deliveryDate)
 * @method \Naugrim\OpenTrans\Nodes\DeliveryDate getDeliveryDate()
 * @method self setParties(\Naugrim\OpenTrans\Nodes\Party[]|array<string, mixed> $parties)
 * @method \Naugrim\OpenTrans\Nodes\Party[] getParties()
 * @method self setCustomerOrderReference(null|array<string, mixed>|\Naugrim\OpenTrans\Nodes\Order\CustomerOrderReference $customerOrderReference)
 * @method \Naugrim\OpenTrans\Nodes\Order\CustomerOrderReference|null getCustomerOrderReference()
 * @method self setPartiesReference(array<string, mixed>|\Naugrim\OpenTrans\Nodes\Order\PartiesReference $partiesReference)
 * @method \Naugrim\OpenTrans\Nodes\Order\PartiesReference getPartiesReference()
 * @method self setDocExchangePartiesReference(null|array<string, mixed>|\Naugrim\OpenTrans\Nodes\DocExchangePartiesReference $docExchangePartiesReference)
 * @method \Naugrim\OpenTrans\Nodes\DocExchangePartiesReference|null getDocExchangePartiesReference()
 * @method self setCurrency(string $currency)
 * @method string getCurrency()
 * @method self setPayment(array<string, mixed>|\Naugrim\OpenTrans\Nodes\Payment\Payment $payment)
 * @method \Naugrim\OpenTrans\Nodes\Payment\Payment getPayment()
 * @method self setTermsAndConditions(string|null $termsAndConditions)
 * @method string|null getTermsAndConditions()
 * @method self setPartialShipmentAllowed(bool $partialShipmentAllowed)
 * @method bool getPartialShipmentAllowed()
 * @method self setTransport(\Naugrim\OpenTrans\Nodes\Logistic\Transport[]|array<string, mixed> $transport)
 * @method \Naugrim\OpenTrans\Nodes\Logistic\Transport[] getTransport()
 * @method self setRemarks(\Naugrim\OpenTrans\Nodes\Remarks[]|array<string, mixed> $remarks)
 * @method \Naugrim\OpenTrans\Nodes\Remarks[] getRemarks()
 */
class Info implements NodeInterface
{
    use HasSerializableAttributes;
    use HasUdxItems;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_ID')]
    protected string $id;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_DATE')]
    protected string $date;

    /**
     * @var Language[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Language::class . '>')]
    #[Serializer\XmlList(entry: 'LANGUAGE', inline: true, namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected array $language = [];

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

    #[Serializer\Expose]
    #[Serializer\Type(CustomerOrderReference::class)]
    #[Serializer\SerializedName('CUSTOMER_ORDER_REFERENCE')]
    protected ?CustomerOrderReference $customerOrderReference = null;

    #[Serializer\Expose]
    #[Serializer\Type(PartiesReference::class)]
    #[Serializer\SerializedName('ORDER_PARTIES_REFERENCE')]
    protected PartiesReference $partiesReference;

    #[Serializer\Expose]
    #[Serializer\Type(DocExchangePartiesReference::class)]
    #[Serializer\SerializedName('DOCEXCHANGE_PARTIES_REFERENCE')]
    protected ?DocExchangePartiesReference $docExchangePartiesReference = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CURRENCY')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $currency;

    #[Serializer\Expose]
    #[Serializer\Type(Payment::class)]
    #[Serializer\SerializedName('PAYMENT')]
    protected Payment $payment;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('TERMS_AND_CONDITIONS')]
    protected ?string $termsAndConditions = null;

    /**
     *
     * @var boolean
     */
    #[Serializer\Expose]
    #[Serializer\Type('bool')]
    #[Serializer\SerializedName('PARTIAL_SHIPMENT_ALLOWED')]
    protected bool $partialShipmentAllowed;

    /**
     * @var Transport[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Transport::class . '>')]
    #[Serializer\XmlList(entry: 'TRANSPORT', inline: true, namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected array $transport = [];

    /**
     * @var Remarks[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Remarks::class . '>')]
    #[Serializer\XmlList(entry: 'REMARKS', inline: true)]
    protected array $remarks = [];

    /**
     * @var array<string, UdxInterface>
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('HEADER_UDX')]
    #[Serializer\Type('array<string,' . Udx::class . '>')]
    #[Serializer\SkipWhenEmpty]
    #[Serializer\XmlKeyValuePairs]
    protected array $headerUdx = [];

    /**
     * @param UdxInterface[]|array{vendor: string, name: string, value: string}[] $udxItems
     */
    public function setHeaderUdx(array $udxItems): self
    {
        $this->headerUdx = [];

        foreach ($udxItems as $udxItem) {
            if (! $udxItem instanceof UdxInterface) {
                $udxItem = $this->convertToUdx($udxItem);
            }

            $this->headerUdx[$this->createUdxElementName($udxItem)] = $udxItem;
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function addParty(Party $party): static
    {
        $this->parties[] = $party;
        return $this;
    }

    public function isPartialShipmentAllowed(): bool
    {
        return $this->partialShipmentAllowed;
    }
}
