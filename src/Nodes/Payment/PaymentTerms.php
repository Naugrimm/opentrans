<?php

namespace Naugrim\OpenTrans\Nodes\Payment;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<PaymentTerms>
 */
class PaymentTerms implements NodeInterface
{
    use HasSerializableAttributes;

    /**
     * @var PaymentTerm[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('PAYMENT_TERMS')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Payment\PaymentTerm>')]
    #[Serializer\XmlList(entry: 'PAYMENT_TERM')]
    protected array $terms = [];


    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('VALUE_DATE')]
    protected ?string $valueDate = null;

    public function addTerm(PaymentTerm $term): PaymentTerms
    {
        $this->terms[] = $term;
        return $this;
    }
}
