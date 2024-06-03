<?php

namespace Naugrim\OpenTrans\Nodes;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<SourcingInfo>
 */
class TimeForPayment implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(DateTimeInterface::class . "<'Y-m-d\\TH:i:s', '', ['Y-m-d\\TH:i:s', 'Y-m-d\\TH:i:sP']>")]
    #[Serializer\SerializedName('PAYMENT_DATE')]
    protected ?DateTimeInterface $paymentDate = null;

    #[Serializer\Expose]
    #[Serializer\Type('int')]
    #[Serializer\SerializedName('DAYS')]
    protected ?int $days = null;

    #[Serializer\Expose]
    #[Serializer\Type('float')]
    #[Serializer\SerializedName('DISCOUNT_FACTOR')]
    protected ?float $discountFactor = null;

    #[Serializer\Expose]
    #[Serializer\Type(AllowOrChargesFix::class)]
    #[Serializer\SerializedName('ALLOW_OR_CHARGES_FIX')]
    protected ?AllowOrChargesFix $allowOrChargesFix = null;
}
