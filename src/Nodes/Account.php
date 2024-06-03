<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<Account>
 */
class Account implements NodeInterface
{
    use HasSerializableAttributes;
    
    #[Serializer\Expose]
    #[Serializer\SerializedName('HOLDER')]
    #[Serializer\Type('string')]
    protected string $holder;

    #[Serializer\Expose]
    #[Serializer\SerializedName('BANK_ACCOUNT')]
    #[Serializer\Type(BankAccount::class)]
    protected BankAccount $bankAccount;

    #[Serializer\Expose]
    #[Serializer\SerializedName('BANK_CODE')]
    #[Serializer\Type(BankCode::class)]
    protected BankCode $bankCode;

    #[Serializer\Expose]
    #[Serializer\SerializedName('BANK_NAME')]
    #[Serializer\Type('string')]
    protected string $bankName;

    #[Serializer\Expose]
    #[Serializer\SerializedName('BANK_COUNTRY')]
    #[Serializer\Type('string')]
    protected string $bankCountry;
}
