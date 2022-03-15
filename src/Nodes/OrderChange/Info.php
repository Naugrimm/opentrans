<?php

namespace Naugrim\OpenTrans\Nodes\OrderChange;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Order\PartiesReference;
use Naugrim\OpenTrans\Nodes\Party;

class Info implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDER_ID")
     *
     * @var string
     */
    protected $id;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDERCHANGE_DATE")
     *
     * @var string
     */
    protected $date;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDERCHANGE_SEQUENCE_ID")
     *
     * @var int
     */
    protected $sequenceId;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("PARTIES")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Party>")
     * @Serializer\XmlList(entry = "PARTY")
     *
     * @var Party[]
     */
    protected $parties = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\PartiesReference")
     * @Serializer\SerializedName("ORDER_PARTIES_REFERENCE")
     *
     * @var PartiesReference
     */
    protected $partiesReference;

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

    /**
     * @return int
     */
    public function getSequenceId(): int
    {
        return $this->sequenceId;
    }

    /**
     * @param int $sequenceId
     * @return Info
     */
    public function setSequenceId(int $sequenceId): Info
    {
        $this->sequenceId = $sequenceId;
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
     * @throws InvalidSetterException
     * @throws UnknownKeyException
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
    public function addParty(Party $party)
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
}
