<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @Serializer\XmlRoot("PARTY")
 */
class Party implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\PartyId")
     * @Serializer\SerializedName("bme:PARTY_ID")
     *
     * @var PartyId
     */
    protected $id;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\PartyRole")
     * @Serializer\SerializedName ("PARTY_ROLE")
     * @var PartyRole
     */
    protected $role;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Address")
     * @Serializer\SerializedName ("ADDRESS")
     * @var Address
     */
    protected $address;
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Account")
     * @Serializer\SerializedName("ACCOUNT")
     * @var Account
     */
    protected $account;

    /**
     * @return PartyId
     */
    public function getId(): PartyId
    {
        return $this->id;
    }

    /**
     * @param PartyId $id
     * @return Party
     */
    public function setId(PartyId $id): Party
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return PartyRole
     */
    public function getRole(): PartyRole
    {
        return $this->role;
    }

    /**
     * @param PartyRole $role
     * @return Party
     */
    public function setRole(PartyRole $role): Party
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Party
     */
    public function setAddress(Address $address): Party
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param Account $account
     * @return Party
     */
    public function setAccount(Account $account): Party
    {
        $this->account = $account;
        return $this;
    }
}
