<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\Party;

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
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('INVOICE_ISSUER_IDREF')]
    protected string $issuerIdRef;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('INVOICE_RECIPIENT_IDREF')]
    protected string $rcptIdRef;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CURRENCY')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
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
