<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<Party>
 * @method self setId(array|\Naugrim\OpenTrans\Nodes\PartyId $id)
 * @method \Naugrim\OpenTrans\Nodes\PartyId getId()
 * @method self setRole(array|\Naugrim\OpenTrans\Nodes\PartyRole $role)
 * @method \Naugrim\OpenTrans\Nodes\PartyRole getRole()
 * @method self setAddress(array|\Naugrim\OpenTrans\Nodes\Address $address)
 * @method \Naugrim\OpenTrans\Nodes\Address getAddress()
 * @method self setAccount(array|\Naugrim\OpenTrans\Nodes\Account $account)
 * @method \Naugrim\OpenTrans\Nodes\Account getAccount()
 */
#[Serializer\XmlRoot('PARTY')]
class Party implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\Type(PartyId::class)]
    #[Serializer\SerializedName('PARTY_ID')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
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
