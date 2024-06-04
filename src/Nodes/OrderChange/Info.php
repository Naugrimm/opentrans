<?php

namespace Naugrim\OpenTrans\Nodes\OrderChange;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Order\PartiesReference;
use Naugrim\OpenTrans\Nodes\Party;

/**
 * @implements NodeInterface<Info>
 * @method self setId(string $id)
 * @method string getId()
 * @method self setDate(string $date)
 * @method string getDate()
 * @method self setSequenceId(int $sequenceId)
 * @method int getSequenceId()
 * @method self setParties(\Naugrim\OpenTrans\Nodes\Party|array $parties)
 * @method Naugrim\OpenTrans\Nodes\Party[] getParties()
 * @method self setPartiesReference(array|\Naugrim\OpenTrans\Nodes\Order\PartiesReference $partiesReference)
 * @method \Naugrim\OpenTrans\Nodes\Order\PartiesReference getPartiesReference()
 */
class Info implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDER_ID')]
    protected string $id;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ORDERCHANGE_DATE')]
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

    #[Serializer\Expose]
    #[Serializer\Type(PartiesReference::class)]
    #[Serializer\SerializedName('ORDER_PARTIES_REFERENCE')]
    protected PartiesReference $partiesReference;

    /**
     * @return $this
     */
    public function addParty(Party $party): static
    {
        $this->parties[] = $party;
        return $this;
    }
}
