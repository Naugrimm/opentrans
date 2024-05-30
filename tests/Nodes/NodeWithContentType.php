<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use Naugrim\OpenTrans\Nodes\Concerns\HasContentTypeAttribute;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class NodeWithContentType implements NodeInterface
{
    use \Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
    use HasContentTypeAttribute;
}