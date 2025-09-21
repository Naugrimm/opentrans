<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<DocExchangePartiesReference>
 * @method self setDocumentIssuerIdRef(null|array<string, mixed>|\Naugrim\OpenTrans\Nodes\IdRef $documentIssuerIdRef)
 * @method \Naugrim\OpenTrans\Nodes\IdRef|null getDocumentIssuerIdRef()
 * @method self setDocumentRecipientIdRef(\Naugrim\OpenTrans\Nodes\IdRef[]|array<string, mixed> $documentRecipientIdRef)
 * @method \Naugrim\OpenTrans\Nodes\IdRef[] getDocumentRecipientIdRef()
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
    #[Serializer\Type('array<' . IdRef::class . '>')]
    #[Serializer\XmlList(entry: 'DOCUMENT_RECIPIENT_IDREF', inline: true)]
    protected array $documentRecipientIdRef = [];
}
