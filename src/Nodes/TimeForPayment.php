<?php

namespace Naugrim\OpenTrans\Nodes;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<SourcingInfo>
 * @method self setPaymentDate(null|array|\DateTimeInterface $paymentDate)
 * @method \DateTimeInterface|null getPaymentDate()
 * @method self setDays(int|null $days)
 * @method int|null getDays()
 * @method self setDiscountFactor(float|null $discountFactor)
 * @method float|null getDiscountFactor()
 * @method self setAllowOrChargesFix(null|array|\Naugrim\OpenTrans\Nodes\AllowOrChargesFix $allowOrChargesFix)
 * @method \Naugrim\OpenTrans\Nodes\AllowOrChargesFix|null getAllowOrChargesFix()
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
