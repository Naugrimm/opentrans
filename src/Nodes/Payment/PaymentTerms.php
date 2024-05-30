<?php

namespace Naugrim\OpenTrans\Nodes\Payment;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class PaymentTerms implements NodeInterface
{
    use \Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
    /**
     * @var PaymentTerm[]
     */
    #[Serializer\SerializedName('PAYMENT_TERMS')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Payment\PaymentTerm>')]
    #[Serializer\XmlList(entry: 'PAYMENT_TERM')]
    private ?array $terms = null;


    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('VALUE_DATE')]
    private ?string $valueDate = null;

    public function addTerm(PaymentTerm $term): PaymentTerms
    {
        $this->terms[] = $term;
        return $this;
    }
}
