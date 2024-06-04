<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Crypto\PublicKey;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<self>
 * @method self setEmail(array $email)
 * @method string[] getEmail()
 * @method self setPublicKeys(\Naugrim\BMEcat\Nodes\Crypto\PublicKey[]|array $publicKeys)
 * @method \Naugrim\BMEcat\Nodes\Crypto\PublicKey[]|array getPublicKeys()
 */
class Emails implements NodeInterface
{
    use HasSerializableAttributes;

    /**
     * @var string[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<string>')]
    #[Serializer\XmlList(entry: 'EMAIL', inline: true, namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected array $email;

    /**
     * @var PublicKey[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . PublicKey::class . '>')]
    #[Serializer\XmlList(entry: 'PUBLIC_KEY', inline: true, namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected array $publicKeys = [];

    public function addPublicKey(PublicKey $publicKey): self
    {
        $this->publicKeys[] = $publicKey;
        return $this;
    }
}
