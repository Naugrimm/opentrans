<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\nodes\Crypto\PublicKey;

class Emails implements NodeInterface
{
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
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Emails
     */
    public function setEmail(string $email): Emails
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return PublicKey[]
     */
    public function getPublicKeys(): array
    {
        return $this->publicKeys;
    }

    /**
     * @param PublicKey[] $publicKeys
     * @return Emails
     */
    public function setPublicKeys(array $publicKeys): Emails
    {
        $this->publicKeys = [];
        foreach ($publicKeys as $publicKey) {
            if (!$publicKey instanceof PublicKey) {
                $publicKey = NodeBuilder::fromArray($publicKey, new PublicKey());
            }

            $this->addPublicKey($publicKey);
        }

        return $this;
    }

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
