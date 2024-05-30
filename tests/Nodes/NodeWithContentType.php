<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasContentTypeAttribute;

class NodeWithContentType implements NodeInterface
{
    use HasSerializableAttributes;
    use HasContentTypeAttribute;
}
