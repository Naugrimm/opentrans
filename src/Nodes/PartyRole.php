<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\CanAssertConstantValue;

/**
 * @implements NodeInterface<PartyRole>
 */
#[Serializer\XmlRoot('PARTY_ROLE')]
class PartyRole implements NodeInterface
{
    use HasSerializableAttributes;
    use CanAssertConstantValue;

    public const string BUYER = 'buyer';

    public const string CENTRAL_REGULATOR = 'central_regulator';

    public const string CUSTOMER = 'customer';

    public const string DELIVERER = 'deliverer';

    public const string DELIVERY = 'delivery';

    public const string DOCUMENT_CREATOR = 'document_creator';

    public const string FINAL_DELIVERY = 'final_delivery';

    public const string INTERMEDIARY = 'intermediary';

    public const string INVOICE_ISSUER = 'invoice_issuer';

    public const string INVOICE_RECIPIENT = 'invoice_recipient';

    public const string IPP_OPERATOR = 'ipp_operator';

    public const string MANUFACTURER = 'manufacturer';

    public const string MARKETPLACE = 'marketplace';

    public const string PAYER = 'payer';

    public const string STANDARDIZATION_BODY = 'standardization_body';

    public const string SUPPLIER = 'supplier';

    public const string TRUSTED_THIRDPARTY = 'trustedthirdparty';

    public const string OTHER = 'other';

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\XmlValue]
    protected string $role = '';

    public function setRole(string $role): void
    {
        self::assertValidConstant($role);
        $this->role = $role;
    }
}
