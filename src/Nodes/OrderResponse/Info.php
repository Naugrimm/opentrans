<?php

namespace Naugrim\OpenTrans\Nodes\OrderResponse;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Order\PartiesReference;
use Naugrim\OpenTrans\Nodes\Party;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<Info>
 */
class Info implements NodeInterface
{
    use HasSerializableAttributes;
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
    #[Serializer\SerializedName('ORDERRESPONSE_DATE')]
    protected string $date;

    #[Serializer\Expose]
    #[Serializer\Type('int')]
    #[Serializer\SerializedName('ORDERCHANGE_SEQUENCE_ID')]
    protected int $sequenceId;

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
     * @param Party $party
     * @return $this
     */
    public function addParty(Party $party): static
    {
        $this->parties[] = $party;
        return $this;
    }
}
