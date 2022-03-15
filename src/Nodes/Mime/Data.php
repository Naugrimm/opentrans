<?php

namespace Naugrim\OpenTrans\Nodes\Mime;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasContentTypeAttribute;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;

class Data implements NodeInterface
{
    use HasContentTypeAttribute, HasStringValue;
}
