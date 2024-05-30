<?php

namespace Utils\Rector\Tests\Rector\SerializedNameWithBmePrefixToBmecatNamespaceRector\Fixture;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Account;
use Naugrim\OpenTrans\Nodes\Address;
use Naugrim\OpenTrans\Nodes\PartyId;
use Naugrim\OpenTrans\Nodes\PartyRole;

/**
 * @implements NodeInterface<\Naugrim\OpenTrans\Nodes\Party>
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
    #[Serializer\SerializedName('bme:PARTY_ROLE')]
    #[Serializer\XmlElement(cdata: true)]
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

?>
-----
<?php

namespace Utils\Rector\Tests\Rector\SerializedNameWithBmePrefixToBmecatNamespaceRector\Fixture;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Account;
use Naugrim\OpenTrans\Nodes\Address;
use Naugrim\OpenTrans\Nodes\PartyId;
use Naugrim\OpenTrans\Nodes\PartyRole;

/**
 * @implements NodeInterface<\Naugrim\OpenTrans\Nodes\Party>
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
    #[Serializer\XmlElement(cdata: true, namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
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

?>
