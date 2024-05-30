<?php

namespace Naugrim\OpenTrans\Nodes\Mime;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasContentTypeAttribute;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;

class Data implements NodeInterface
{
    use HasSerializableAttributes;
    use HasContentTypeAttribute;
    use HasStringValue;
}
