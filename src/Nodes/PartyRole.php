<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\Nodes\Concerns\CanAssertConstantValue;

/**
 * @Serializer\XmlRoot("PARTY_ROLE")
 */
class PartyRole
{
    use CanAssertConstantValue;

    public const BUYER = 'buyer';
    public const CENTRAL_REGULATOR = 'central_regulator';
    public const CUSTOMER = 'customer';
    public const DELIVERER = 'deliverer';
    public const DELIVERY = 'delivery';
    public const DOCUMENT_CREATOR = 'document_creator';
    public const FINAL_DELIVERY = 'final_delivery';
    public const INTERMEDIARY = 'intermediary';
    public const INVOICE_ISSUER = 'invoice_issuer';
    public const INVOICE_RECIPIENT = 'invoice_recipient';
    public const IPP_OPERATOR = 'ipp_operator';
    public const MANUFACTURER = 'manufacturer';
    public const MARKETPLACE = 'marketplace';
    public const PAYER = 'payer';
    public const STANDARDIZATION_BODY = 'standardization_body';
    public const SUPPLIER = 'supplier';
    public const TRUSTED_THIRDPARTY = 'trustedthirdparty';
    public const OTHER = 'other';

    /**
     * @Serializer\Type("string")
     * @Serializer\Inline
     * @Serializer\SerializedName("PARTY_ROLE")
     * @var string
     */
    protected $role = '';

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->assertValidConstant($role);
        $this->role = $role;
    }
}
