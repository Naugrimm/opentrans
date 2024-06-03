<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Concerns\HasStringValue;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<self>
 */
class AgreementDescr implements NodeInterface
{
    use HasSerializableAttributes;

    /**
     * @use HasStringValue<self>
     */
    use HasStringValue;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\XmlAttribute]
    protected string $lang;
}
