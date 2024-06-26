<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;

trait HasContentTypeAttribute
{
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('contentType')]
    #[Serializer\XmlAttribute]
    protected string $contentType;
}
