<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;

trait HasLangAttribute
{
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('lang')]
    #[Serializer\XmlAttribute]
    protected string $lang;
}
