<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasStringValue
{
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\XmlValue]
    protected string $value;
}
