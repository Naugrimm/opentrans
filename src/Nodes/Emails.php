<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Crypto\PublicKey;

/**
 * @implements NodeInterface<Emails>
 */
class Emails implements NodeInterface
{
    use HasSerializableAttributes;
    
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
    #[Serializer\XmlList(inline: true)]
    protected array $publicKeys = [];

    public function addPublicKey(PublicKey $publicKey): Emails
    {
        $this->publicKeys[] = $publicKey;
        return $this;
    }
}
