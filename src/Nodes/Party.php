<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<Party>
 */
#[Serializer\XmlRoot('PARTY')]
class Party implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type(PartyId::class)]
    #[Serializer\SerializedName('bme:PARTY_ID')]
    protected PartyId $id;

    #[Serializer\Expose]
    #[Serializer\Type(PartyRole::class)]
    #[Serializer\SerializedName('PARTY_ROLE')]
    protected PartyRole $role;

    #[Serializer\Expose]
    #[Serializer\Type(Address::class)]
    #[Serializer\SerializedName('ADDRESS')]
    protected Address $address;

    #[Serializer\Expose]
    #[Serializer\Type(Account::class)]
    #[Serializer\SerializedName('ACCOUNT')]
    protected Account $account;
}
