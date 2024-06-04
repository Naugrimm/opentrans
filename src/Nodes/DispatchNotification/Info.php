<?php

namespace Naugrim\OpenTrans\Nodes\DispatchNotification;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\BuyerIdRef;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Language;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\DocExchangePartiesReference;
use Naugrim\OpenTrans\Nodes\Logistic\LogisticDetailsInfo;
use Naugrim\OpenTrans\Nodes\Mime;
use Naugrim\OpenTrans\Nodes\Order\ShipmentPartiesReference;
use Naugrim\OpenTrans\Nodes\Party;
use Naugrim\OpenTrans\Nodes\Remarks;
use Naugrim\OpenTrans\Nodes\Udx;
use Naugrim\OpenTrans\Nodes\UdxInterface;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<Info>
 * @method self setId(string $id)
 * @method string getId()
 * @method self setDispatchNotificationDate(string $dispatchNotificationDate)
 * @method string getDispatchNotificationDate()
 * @method self setLanguage(\Naugrim\BMEcat\Nodes\Language[]|array $language)
 * @method \Naugrim\BMEcat\Nodes\Language[]|array getLanguage()
 * @method self setDeliveryDate(array|\Naugrim\OpenTrans\Nodes\DeliveryDate $deliveryDate)
 * @method \Naugrim\OpenTrans\Nodes\DeliveryDate getDeliveryDate()
 * @method self setParties(\Naugrim\OpenTrans\Nodes\Party[]|array $parties)
 * @method \Naugrim\OpenTrans\Nodes\Party[]|array getParties()
 * @method self setSupplierIdRef(array|\Naugrim\BMEcat\Nodes\SupplierIdRef $supplierIdRef)
 * @method \Naugrim\BMEcat\Nodes\SupplierIdRef getSupplierIdRef()
 * @method self setBuyerIdRef(null|array|\Naugrim\BMEcat\Nodes\BuyerIdRef $buyerIdRef)
 * @method \Naugrim\BMEcat\Nodes\BuyerIdRef|null getBuyerIdRef()
 * @method self setShipmentPartiesReference(array|\Naugrim\OpenTrans\Nodes\Order\ShipmentPartiesReference $shipmentPartiesReference)
 * @method \Naugrim\OpenTrans\Nodes\Order\ShipmentPartiesReference getShipmentPartiesReference()
 * @method self setShipmentId(string|null $shipmentId)
 * @method string|null getShipmentId()
 * @method self setTrackingTracingUrl(string|null $trackingTracingUrl)
 * @method string|null getTrackingTracingUrl()
 * @method self setDocExchangePartiesReference(null|array|\Naugrim\OpenTrans\Nodes\DocExchangePartiesReference $docExchangePartiesReference)
 * @method \Naugrim\OpenTrans\Nodes\DocExchangePartiesReference|null getDocExchangePartiesReference()
 * @method self setLogisticDetailsInfo(null|array|\Naugrim\OpenTrans\Nodes\Logistic\LogisticDetailsInfo $logisticDetailsInfo)
 * @method \Naugrim\OpenTrans\Nodes\Logistic\LogisticDetailsInfo|null getLogisticDetailsInfo()
 * @method self setMimeInfo(\Naugrim\OpenTrans\Nodes\Mime[]|array $mimeInfo)
 * @method \Naugrim\OpenTrans\Nodes\Mime[]|array getMimeInfo()
 * @method self setRemarks(\Naugrim\OpenTrans\Nodes\Remarks[]|array $remarks)
 * @method \Naugrim\OpenTrans\Nodes\Remarks[]|array getRemarks()
 * @method self setHeaderUdx(array $headerUdx)
 * @method array getHeaderUdx()
 */
class Info implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DISPATCHNOTIFICATION_ID')]
    protected string $id;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DISPATCHNOTIFICATION_DATE')]
    protected string $dispatchNotificationDate;

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
    #[Serializer\Type('array<' . Party::class . '>')]
    #[Serializer\XmlList(entry: 'PARTY')]
    protected array $parties = [];

    #[Serializer\Expose]
    #[Serializer\Type(SupplierIdRef::class)]
    #[Serializer\SerializedName('SUPPLIER_IDREF')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected SupplierIdRef $supplierIdRef;

    #[Serializer\Expose]
    #[Serializer\Type(BuyerIdRef::class)]
    #[Serializer\SerializedName('BUYER_IDREF')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected ?BuyerIdRef $buyerIdRef = null;

    #[Serializer\Expose]
    #[Serializer\Type(ShipmentPartiesReference::class)]
    #[Serializer\SerializedName('SHIPMENT_PARTIES_REFERENCE')]
    protected ShipmentPartiesReference $shipmentPartiesReference;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('SHIPMENT_ID')]
    protected ?string $shipmentId = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('TRACKING_TRACING_URL')]
    protected ?string $trackingTracingUrl = null;

    #[Serializer\Expose]
    #[Serializer\Type(DocExchangePartiesReference::class)]
    #[Serializer\SerializedName('DOCEXCHANGE_PARTIES_REFERENCE')]
    protected ?DocExchangePartiesReference $docExchangePartiesReference = null;

    #[Serializer\Expose]
    #[Serializer\Type(LogisticDetailsInfo::class)]
    #[Serializer\SerializedName('LOGISTIC_DETAILS_INFO')]
    protected ?LogisticDetailsInfo $logisticDetailsInfo = null;

    /**
     * @var Mime[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('MIME_INFO')]
    #[Serializer\Type('array<' . Mime::class . '>')]
    #[Serializer\XmlList(entry: 'MIME')]
    protected array $mimeInfo = [];

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
     * @return $this
     */
    public function addParty(Party $party): static
    {
        $this->parties[] = $party;
        return $this;
    }
}
