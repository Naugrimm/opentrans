<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Payment;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @implements NodeInterface<Card>
 * @method self setNumber(string $number)
 * @method string getNumber()
 * @method self setAuthCode(string|null $authCode)
 * @method string|null getAuthCode()
 * @method self setRefNUm(string|null $refNUm)
 * @method string|null getRefNUm()
 * @method self setExpDate(null|array|\DateTimeInterface $expDate)
 * @method \DateTimeInterface|null getExpDate()
 * @method self setHolder(string|null $holder)
 * @method string|null getHolder()
 */
class Card implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     * @use HasTypeAttribute<self>
     */
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
    protected string $number;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CARD_AUTH_CODE')]
    protected ?string $authCode = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CARD_REF_NUM')]
    protected ?string $refNUm = null;

    #[Serializer\Expose]
    #[Serializer\Type("DateTimeInterface<'Y-m'>")]
    #[Serializer\SerializedName('CARD_EXPIRATION_DATE')]
    protected ?DateTimeInterface $expDate = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CARD_HOLDER_NAME')]
    protected ?string $holder = null;

    public static function create(string $type, string $number, string $holder, DateTimeInterface $expDate): Card
    {
        return NodeBuilder::fromArray([
            'holder' => $holder,
            'number' => $number,
            'expDate' => $expDate,
            'type' => $type,
        ], Card::class);
    }
}
