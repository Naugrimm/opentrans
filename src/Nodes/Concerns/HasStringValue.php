<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;

trait HasStringValue
{
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\XmlValue]
    protected string $value;
}
