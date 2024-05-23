<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Payment;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

class Card implements NodeInterface
{
    use HasTypeAttribute;

    public const MASTER_CARD = 'MasterCard';
    public const VISA = 'VISA';
    public const AMERICAN_EXPRESS = 'AmericanExpress';
    public const JCB = 'JCB';
    public const MAESTRO = 'Maestro';
    public const DISCOVER_CARD = 'DiscoverCard';
    public const TRANS_CARD = 'Transcard';
    public const DINA_CARD = 'DinaCard';
    public const CHINA_UNION_PAY = 'ChinaUnionPay';

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CARD_NUM')]
    private $number;

    /**
     *
     * @var DateTimeInterface
     */
    #[Serializer\Expose]
    #[Serializer\Type("DateTimeInterface<'Y-m'>")]
    #[Serializer\SerializedName('CARD_EXPIRATION_DATE')]
    private $expDate;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CARD_HOLDER_NAME')]
    private $holder;

    public static function create(string $type, string $number, string $holder, DateTimeInterface $expDate): Card
    {
        return (new static())->setHolder($holder)->setNumber($number)->setExpDate($expDate)->setType($type);
    }

    public function getHolder(): string
    {
        return $this->holder;
    }

    public function setHolder(string $holder): Card
    {
        $this->holder = $holder;
        return $this;
    }

    public function getExpDate(): DateTimeInterface
    {
        return $this->expDate;
    }

    public function setExpDate(DateTimeInterface $expDate): Card
    {
        $this->expDate = $expDate;
        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): Card
    {
        $this->number = $number;
        return $this;
    }
}
