<?php

namespace Naugrim\OpenTrans\Nodes\File;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasLangAttribute;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

class HashValue implements NodeInterface
{
    use HasTypeAttribute, HasStringValue, HasLangAttribute;
}
