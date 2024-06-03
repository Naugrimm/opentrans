<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<DocExchangePartiesReference>
 */
class DocExchangePartiesReference implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(IdRef::class)]
    #[Serializer\SerializedName('DOCUMENT_ISSUER_IDREF')]
    protected ?IdRef $documentIssuerIdRef = null;

    /**
     * @var IdRef[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<'.IdRef::class.'>')]
    #[Serializer\XmlList(entry: 'DOCUMENT_RECIPIENT_IDREF', inline: true)]
    protected array $documentRecipientIdRef = [];
}
