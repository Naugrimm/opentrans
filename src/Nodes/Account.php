<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<Account>
 */
class Account implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('HOLDER')]
    #[Serializer\Type('string')]
    protected string $holder;

    /**
     * @var BankAccount
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('BANK_ACCOUNT')]
    #[Serializer\Type(BankAccount::class)]
    protected BankAccount $bankAccount;

    /**
     * @var BankCode
     */
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
