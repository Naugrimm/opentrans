<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

#[Serializer\XmlRoot('PARTY')]
class Party implements NodeInterface
{
    use \Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
    /**
     *
     * @var PartyId
     */
    #[Serializer\Expose]
    #[Serializer\Type(PartyId::class)]
    #[Serializer\SerializedName('bme:PARTY_ID')]
    protected PartyId $id;

    /**
     * @var PartyRole
     */
    #[Serializer\Expose]
    #[Serializer\Type(PartyRole::class)]
    #[Serializer\SerializedName('PARTY_ROLE')]
    protected PartyRole $role;

    /**
     * @var Address
     */
    #[Serializer\Expose]
    #[Serializer\Type(Address::class)]
    #[Serializer\SerializedName('ADDRESS')]
    protected Address $address;

    /**
     * @var Account
     */
    #[Serializer\Expose]
    #[Serializer\Type(Account::class)]
    #[Serializer\SerializedName('ACCOUNT')]
    protected Account $account;
}
