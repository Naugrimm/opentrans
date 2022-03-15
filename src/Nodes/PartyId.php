<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @Serializer\XmlRoot("PARTY_ID")
 */
class PartyId implements NodeInterface
{
    use HasTypeAttribute, HasStringValue;

    public const TYPE_SUPPLIER_SPECIFIC = 'supplier_specific';
    public const TYPE_BUYER_SPECIFIC = 'buyer_specific';
    public const TYPE_CUSTOMER_SPECIFIC = 'customer_specific';
    public const TYPE_PARTY_SPECIFIC = 'party_specific';
    public const TYPE_DUNS = 'duns';
    public const TYPE_ILN = 'iln';
    public const TYPE_GLN = 'gln';
    public const TYPE_BUYER = 'buyer';
    public const TYPE_ISSUER = 'issuer';
    public const TYPE_SUPPLIER = 'supplier';
}
