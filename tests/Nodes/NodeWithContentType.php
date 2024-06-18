<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasContentTypeAttribute;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<NodeWithContentType>
 * @method self setContentType(string $contentType)
 * @method string getContentType()
 */
class NodeWithContentType implements NodeInterface
{
    use HasSerializableAttributes;
    use HasContentTypeAttribute;
}
