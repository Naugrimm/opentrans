<?php

namespace Naugrim\OpenTrans\Nodes\Payment;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class PaymentTerms implements NodeInterface
{
    /**
     * @var PaymentTerm[]
     */
    #[Serializer\SerializedName('PAYMENT_TERMS')]
    #[Serializer\Type('array<Naugrim\OpenTrans\Nodes\Payment\PaymentTerm>')]
    #[Serializer\XmlList(entry: 'PAYMENT_TERM')]
    private $terms;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('VALUE_DATE')]
    private $valueDate;

    public function getTerms(): array
    {
        return $this->terms;
    }

    public function setTerms(array $terms): PaymentTerms
    {
        foreach ($terms as $term) {
            $this->addTerm($term);
        }

        return $this;
    }
    public function addTerm(PaymentTerm $term): PaymentTerms
    {
        $this->terms[] = $term;
        return $this;
    }

    public function getValueDate(): string
    {
        return $this->valueDate;
    }

    public function setValueDate(string $valueDate): PaymentTerms
    {
        $this->valueDate = $valueDate;
        return $this;
    }
}
