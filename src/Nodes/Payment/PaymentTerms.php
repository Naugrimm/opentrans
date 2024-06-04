<?php

namespace Naugrim\OpenTrans\Nodes\Payment;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\TimeForPayment;

/**
 * @implements NodeInterface<PaymentTerms>
 * @method self setTerms(\Naugrim\OpenTrans\Nodes\Payment\PaymentTerm[]|array $terms)
 * @method \Naugrim\OpenTrans\Nodes\Payment\PaymentTerm[]|array getTerms()
 * @method self setValueDate(string|null $valueDate)
 * @method string|null getValueDate()
 * @method self setTimeForPayment(null|array|\Naugrim\OpenTrans\Nodes\TimeForPayment $timeForPayment)
 * @method \Naugrim\OpenTrans\Nodes\TimeForPayment|null getTimeForPayment()
 */
class PaymentTerms implements NodeInterface
{
    use HasSerializableAttributes;

    /**
     * @var PaymentTerm[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('PAYMENT_TERMS')]
    #[Serializer\Type('array<' . PaymentTerm::class . '>')]
    #[Serializer\XmlList(entry: 'PAYMENT_TERM')]
    protected array $terms = [];

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('VALUE_DATE')]
    protected ?string $valueDate = null;

    #[Serializer\Expose]
    #[Serializer\Type(TimeForPayment::class)]
    #[Serializer\SerializedName('TIME_FOR_PAYMENT')]
    protected ?TimeForPayment $timeForPayment = null;

    public function addTerm(PaymentTerm $term): PaymentTerms
    {
        $this->terms[] = $term;
        return $this;
    }
}
