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
