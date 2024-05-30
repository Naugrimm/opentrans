<?php

namespace Naugrim\OpenTrans\Nodes\Payment;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Account;
use Naugrim\OpenTrans\Nodes\BankAccount;
use Naugrim\OpenTrans\Nodes\BankCode;

/**
 * @implements NodeInterface<Payment>
 */
class Payment implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(Card::class)]
    #[Serializer\SerializedName('CARD')]
    protected ?Card $card = null;

    /**
     * @var Account[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Account>')]
    #[Serializer\XmlList(entry: 'ACCOUNT', inline: true)]
    protected array $accounts = [];

    #[Serializer\Expose]
    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('CASH')]
    protected ?bool $cash = null;

    #[Serializer\Expose]
    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('DEBIT')]
    protected ?bool $debit = null;

    #[Serializer\Expose]
    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('CHECK')]
    protected ?bool $check = null;

    #[Serializer\Expose]
    #[Serializer\Type('boolean')]
    #[Serializer\SerializedName('CENTRAL_REGULATION')]
    protected ?bool $centralRegulation = null;

    #[Serializer\Expose]
    #[Serializer\Type('Naugrim\BMEcat\Nodes\Payment\PaymentTerms')]
    #[Serializer\SerializedName('PAYMENT_TERMS')]
    protected ?PaymentTerms $paymentTerms = null;

    public static function createCardPayment(
        string            $cartType,
        string            $cardNumber,
        string            $cardHolder,
        DateTimeInterface $expDate
    ): Payment {
        return NodeBuilder::fromArray([], Payment::class)->setCard(Card::create($cartType, $cardNumber, $cardHolder, $expDate));
    }

    public static function createCashPayment(): Payment
    {
        return NodeBuilder::fromArray([], Payment::class)->setCash(true);
    }

    public static function createDebitPayment(): Payment
    {
        return NodeBuilder::fromArray([], Payment::class)->setDebit(true);
    }

    public static function createCheckPayment(): Payment
    {
        return NodeBuilder::fromArray([], Payment::class)->setCheck(true);
    }

    public static function createIbanPayment(
        string $iban,
        string $accountHolder,
        string $bankName,
        string $bic,
        string $country
    ): Payment {
        $bankAccount = NodeBuilder::fromArray([], BankAccount::class);
        $bankAccount->setType(BankAccount::TYPE_IBAN);
        $bankAccount->setValue($iban);

        $bankCode = NodeBuilder::fromArray([], BankCode::class);
        $bankCode->setType(BankCode::TYPE_BIC);
        $bankCode->setValue($bic);

        return NodeBuilder::fromArray([], Payment::class)->addAccount(
            (NodeBuilder::fromArray([], Account::class))
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
        $this->accounts = [];

        return $this;
    }

    public function addAccount(Account $account): Payment
    {
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
        $this->accounts = [];

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
        $this->accounts = [];
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
        $this->accounts = [];
        $this->card = null;

        return $this;
    }

    public function isCentralRegulation(): bool
    {
        return $this->centralRegulation === true;
    }
}
