<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use Naugrim\OpenTrans\Nodes\Concerns\HasContentTypeAttribute;
use Naugrim\OpenTrans\Nodes\NodeInterface;

class NodeWithContentType implements NodeInterface
{
    use HasContentTypeAttribute;
}