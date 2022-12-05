<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class Account implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("HOLDER")
     * @Serializer\Type("string")
     * @var string
     */
    protected $holder;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("BANK_ACCOUNT")
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\BankAccount")
     * @var BankAccount
     */
    protected $bankAccount;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("BANK_CODE")
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\BankCode")
     * @var BankCode
     */
    protected $bankCode;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("BANK_NAME")
     * @var string
     */
    protected $bankName;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("BANK_COUNTRY")
     * @var string
     */
    protected $bankCountry;

    /**
     * @return string
     */
    public function getHolder(): string
    {
        return $this->holder;
    }

    /**
     * @param string $holder
     * @return Account
     */
    public function setHolder(string $holder): Account
    {
        $this->holder = $holder;
        return $this;
    }

    /**
     * @return BankAccount
     */
    public function getBankAccount(): BankAccount
    {
        return $this->bankAccount;
    }

    /**
     * @param BankAccount $bankAccount
     * @return Account
     */
    public function setBankAccount(BankAccount $bankAccount): Account
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * @return BankCode
     */
    public function getBankCode(): BankCode
    {
        return $this->bankCode;
    }

    /**
     * @param BankCode $bankCode
     * @return Account
     */
    public function setBankCode(BankCode $bankCode): Account
    {
        $this->bankCode = $bankCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     * @return Account
     */
    public function setBankName(string $bankName): Account
    {
        $this->bankName = $bankName;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankCountry(): string
    {
        return $this->bankCountry;
    }

    /**
     * @param string $bankCountry
     * @return Account
     */
    public function setBankCountry(string $bankCountry): Account
    {
        $this->bankCountry = $bankCountry;
        return $this;
    }
}
