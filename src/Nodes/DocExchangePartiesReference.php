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
    #[Serializer\SerializedName('DOCUMENT_ISSUER_ IDREF')]
    protected ?IdRef $documentIssuerIdRef = null;

    #[Serializer\Expose]
    #[Serializer\Type(IdRef::class)]
    #[Serializer\SerializedName('DOCUMENT_RECIPIENT_ IDREF')]
    protected ?IdRef $documentRecipientIdRef = null;
}
