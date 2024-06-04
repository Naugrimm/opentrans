<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<Account>
 * @method self setHolder(string $holder)
 * @method string getHolder()
 * @method self setBankAccount(array|\Naugrim\OpenTrans\Nodes\BankAccount $bankAccount)
 * @method \Naugrim\OpenTrans\Nodes\BankAccount getBankAccount()
 * @method self setBankCode(array|\Naugrim\OpenTrans\Nodes\BankCode $bankCode)
 * @method \Naugrim\OpenTrans\Nodes\BankCode getBankCode()
 * @method self setBankName(string $bankName)
 * @method string getBankName()
 * @method self setBankCountry(string $bankCountry)
 * @method string getBankCountry()
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
