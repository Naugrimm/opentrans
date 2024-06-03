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
