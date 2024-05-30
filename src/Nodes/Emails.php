<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\nodes\Crypto\PublicKey;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<Emails>
 */
class Emails implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('bme:EMAIL')]
    protected string $email = '';

    /**
     *
     * @var PublicKey[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('bme:PUBLIC_KEY')]
    #[Serializer\Type('array<Naugrim\BMEcat\Nodes\Crypto\PublicKey>')]
    #[Serializer\XmlList(inline: 'true')]
    protected array $publicKeys = [];

    /**
     * @param PublicKey $publicKey
     * @return Emails
     */
    public function addPublicKey(PublicKey $publicKey): Emails
    {
        $this->publicKeys[] = $publicKey;
        return $this;
    }
}
