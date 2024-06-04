<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\BuyerIdRef;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Language;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\InvoiceRcptIdRef;
use Naugrim\OpenTrans\Nodes\Party;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<Info>
 * @method self setId(string $id)
 * @method string getId()
 * @method self setDate(string $date)
 * @method string getDate()
 * @method self setDeliveryDate(array|\Naugrim\OpenTrans\Nodes\DeliveryDate $deliveryDate)
 * @method \Naugrim\OpenTrans\Nodes\DeliveryDate getDeliveryDate()
 * @method self setLanguage(\Naugrim\BMEcat\Nodes\Language[]|array $language)
 * @method \Naugrim\BMEcat\Nodes\Language[]|array getLanguage()
 * @method self setParties(\Naugrim\OpenTrans\Nodes\Party[]|array $parties)
 * @method \Naugrim\OpenTrans\Nodes\Party[]|array getParties()
 * @method self setIssuerIdRef(array|\Naugrim\OpenTrans\Nodes\Invoice\IssuerIdRef $issuerIdRef)
 * @method \Naugrim\OpenTrans\Nodes\Invoice\IssuerIdRef getIssuerIdRef()
 * @method self setRcptIdRef(array|\Naugrim\OpenTrans\Nodes\InvoiceRcptIdRef $rcptIdRef)
 * @method \Naugrim\OpenTrans\Nodes\InvoiceRcptIdRef getRcptIdRef()
 * @method self setBuyerIdRef(null|array|\Naugrim\BMEcat\Nodes\BuyerIdRef $buyerIdRef)
 * @method \Naugrim\BMEcat\Nodes\BuyerIdRef|null getBuyerIdRef()
 * @method self setSupplierIdRef(null|array|\Naugrim\BMEcat\Nodes\SupplierIdRef $supplierIdRef)
 * @method \Naugrim\BMEcat\Nodes\SupplierIdRef|null getSupplierIdRef()
 * @method self setCurrency(string $currency)
 * @method string getCurrency()
 */
class Info implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('INVOICE_ID')]
    protected string $id;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('INVOICE_DATE')]
    protected string $date;

    #[Serializer\Expose]
    #[Serializer\Type(DeliveryDate::class)]
    #[Serializer\SerializedName('DELIVERY_DATE')]
    protected DeliveryDate $deliveryDate;

    /**
     * @var Language[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Language::class . '>')]
    #[Serializer\XmlList(entry: 'LANGUAGE', inline: true, namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected array $language = [];

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
    #[Serializer\Type(IssuerIdRef::class)]
    #[Serializer\SerializedName('INVOICE_ISSUER_IDREF')]
    protected IssuerIdRef $issuerIdRef;

    #[Serializer\Expose]
    #[Serializer\Type(InvoiceRcptIdRef::class)]
    #[Serializer\SerializedName('INVOICE_RECIPIENT_IDREF')]
    protected InvoiceRcptIdRef $rcptIdRef;

    #[Serializer\Expose]
    #[Serializer\Type(BuyerIdRef::class)]
    #[Serializer\SerializedName('BUYER_IDREF')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected ?BuyerIdRef $buyerIdRef = null;

    #[Serializer\Expose]
    #[Serializer\Type(SupplierIdRef::class)]
    #[Serializer\SerializedName('SUPPLIER_IDREF')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected ?SupplierIdRef $supplierIdRef = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CURRENCY')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $currency;

    /**
     * @return $this
     */
    public function addParty(Party $party): static
    {
        $this->parties[] = $party;
        return $this;
    }
}
