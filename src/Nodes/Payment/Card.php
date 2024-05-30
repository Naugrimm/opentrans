<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Payment;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

class Card implements NodeInterface
{
    use \Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
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


    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CARD_NUM')]
    private ?string $number = null;


    #[Serializer\Expose]
    #[Serializer\Type("DateTimeInterface<'Y-m'>")]
    #[Serializer\SerializedName('CARD_EXPIRATION_DATE')]
    private ?DateTimeInterface $expDate = null;


    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CARD_HOLDER_NAME')]
    private ?string $holder = null;

    public static function create(string $type, string $number, string $holder, DateTimeInterface $expDate): Card
    {
        return (new static())->setHolder($holder)->setNumber($number)->setExpDate($expDate)->setType($type);
    }
}
