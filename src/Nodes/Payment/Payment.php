<?php

namespace Naugrim\OpenTrans\Nodes\Payment;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Account;
use Naugrim\OpenTrans\Nodes\BankAccount;
use Naugrim\OpenTrans\Nodes\BankCode;

class Payment implements NodeInterface
{
    #[Serializer\Type(Card::class)]
    #[Serializer\SerializedName('CARD')]
    private ?Card $card = null;

    /**
     * @var Account[]|null
     */
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Account>')]
    #[Serializer\XmlList(entry: 'ACCOUNT', inline: true)]
    private ?array $accounts = null;


    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('CASH')]
    private ?bool $cash = null;


    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('DEBIT')]
    private ?bool $debit = null;


    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('CHECK')]
    private ?bool $check = null;


    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('CENTRAL_REGULATION')]
    private ?bool $centralRegulation = null;


    #[Serializer\Expose]
    #[Serializer\Type('Naugrim\BMEcat\Nodes\Payment\PaymentTerms')]
    #[Serializer\SerializedName('PAYMENT_TERMS')]
    private ?PaymentTerms $paymentTerms = null;

    public static function createCardPayment(
        string            $cartType,
        string            $cardNumber,
        string            $cardHolder,
        DateTimeInterface $expDate
    ): Payment
    {
        return (new Payment())->setCard(Card::create($cartType, $cardNumber, $cardHolder, $expDate));
    }

    public static function createCashPayment(): Payment
    {
        return (new Payment())->setCash(true);
    }

    public static function createDebitPayment(): Payment
    {
        return (new Payment())->setDebit(true);
    }

    public static function createCheckPayment(): Payment
    {
        return (new Payment())->setCheck(true);
    }

    public static function createIbanPayment(
        string $iban,
        string $accountHolder,
        string $bankName,
        string $bic,
        string $country
    ): Payment
    {
        $bankAccount = new BankAccount();
        $bankAccount->setType(BankAccount::TYPE_IBAN);
        $bankAccount->setValue($iban);

        $bankCode = new BankCode();
        $bankCode->setType(BankCode::TYPE_BIC);
        $bankCode->setValue($bic);

        return (new Payment())->addAccount(
            (new Account())
                ->setBankAccount($bankAccount)
                ->setHolder($accountHolder)
                ->setBankName($bankName)
                ->setBankCode($bankCode)
                ->setBankCountry($country)
        );
    }

    public function getCard(): ?Card
    {
        return $this->card;
    }

    public function setCard(Card $card): Payment
    {
        $this->card = $card;
        $this->check = null;
        $this->debit = null;
        $this->cash = null;
        $this->accounts = null;

        return $this;
    }

    /**
     * @return Account[]
     */
    public function getAccounts(): ?array
    {
        return $this->accounts;
    }

    /**
     * @param Account[] $accounts
     * @return Payment
     */
    public function setAccounts(array $accounts): Payment
    {
        if ($accounts === []) {
            return $this;
        }

        foreach ($accounts as $account) {
            if (!$account instanceof Account) {
                $account = NodeBuilder::fromArray($account, new Account());
            }

            $this->addAccount($account);
        }

        return $this;
    }

    public function addAccount(Account $account): Payment
    {
        if (null === $this->accounts) {
            $this->accounts = [];
        }

        $this->accounts[] = $account;
        $this->cash = null;
        $this->debit = null;
        $this->check = null;
        $this->card = null;

        return $this;
    }

    public function isCash(): bool
    {
        return (bool)$this->cash;
    }

    public function setCash(bool $cash): Payment
    {
        $this->cash = $cash;
        $this->debit = null;
        $this->check = null;
        $this->card = null;
        $this->accounts = null;

        return $this;
    }

    public function isDebit(): bool
    {
        return (bool)$this->debit;
    }

    public function setDebit(bool $debit): Payment
    {
        $this->debit = $debit;
        $this->cash = null;
        $this->check = null;
        $this->accounts = null;
        $this->card = null;

        return $this;
    }

    public function isCheck(): bool
    {
        return (bool)$this->check;
    }

    public function setCheck(bool $check): Payment
    {
        $this->check = $check;
        $this->cash = null;
        $this->debit = null;
        $this->accounts = null;
        $this->card = null;

        return $this;
    }

    public function isCentralRegulation(): bool
    {
        return $this->centralRegulation;
    }

    public function setCentralRegulation(bool $hasCentralRegulation): Payment
    {
        $this->centralRegulation = $hasCentralRegulation;
        return $this;
    }

    public function getPaymentTerms(): PaymentTerms
    {
        return $this->paymentTerms;
    }

    public function setPaymentTerms(PaymentTerms $paymentTerms): Payment
    {
        $this->paymentTerms = $paymentTerms;
        return $this;
    }
}
