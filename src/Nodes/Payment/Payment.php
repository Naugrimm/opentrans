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
    use \Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(Card::class)]
    #[Serializer\SerializedName('CARD')]
    private ?Card $card = null;

    /**
     * @var Account[]|null
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Account>')]
    #[Serializer\XmlList(entry: 'ACCOUNT', inline: true)]
    private ?array $accounts = null;


    #[Serializer\Expose]
    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('CASH')]
    private ?bool $cash = null;


    #[Serializer\Expose]
    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('DEBIT')]
    private ?bool $debit = null;


    #[Serializer\Expose]
    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('CHECK')]
    private ?bool $check = null;


    #[Serializer\Expose]
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
        return (\Naugrim\BMEcat\Builder\NodeBuilder::fromArray([], Payment::class))->setCard(Card::create($cartType, $cardNumber, $cardHolder, $expDate));
    }

    public static function createCashPayment(): Payment
    {
        return (\Naugrim\BMEcat\Builder\NodeBuilder::fromArray([], Payment::class))->setCash(true);
    }

    public static function createDebitPayment(): Payment
    {
        return (\Naugrim\BMEcat\Builder\NodeBuilder::fromArray([], Payment::class))->setDebit(true);
    }

    public static function createCheckPayment(): Payment
    {
        return (\Naugrim\BMEcat\Builder\NodeBuilder::fromArray([], Payment::class))->setCheck(true);
    }

    public static function createIbanPayment(
        string $iban,
        string $accountHolder,
        string $bankName,
        string $bic,
        string $country
    ): Payment
    {
        $bankAccount = \Naugrim\BMEcat\Builder\NodeBuilder::fromArray([], BankAccount::class);
        $bankAccount->setType(BankAccount::TYPE_IBAN);
        $bankAccount->setValue($iban);

        $bankCode = \Naugrim\BMEcat\Builder\NodeBuilder::fromArray([], BankCode::class);
        $bankCode->setType(BankCode::TYPE_BIC);
        $bankCode->setValue($bic);

        return (\Naugrim\BMEcat\Builder\NodeBuilder::fromArray([], Payment::class))->addAccount(
            (\Naugrim\BMEcat\Builder\NodeBuilder::fromArray([], Account::class))
                ->setBankAccount($bankAccount)
                ->setHolder($accountHolder)
                ->setBankName($bankName)
                ->setBankCode($bankCode)
                ->setBankCountry($country)
        );
    }

    /**
     * @param Card|array<string, mixed> $card
     * @return $this
     */
    public function setCard(Card|array $card): Payment
    {
        $this->card = is_array($card) ? NodeBuilder::fromArray($card, Card::class) : $card;
        $this->check = null;
        $this->debit = null;
        $this->cash = null;
        $this->accounts = null;

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
}
