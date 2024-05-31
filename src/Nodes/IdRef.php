<?php

namespace Naugrim\OpenTrans\Nodes;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @implements NodeInterface<IdRef>
 */
class IdRef implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     * @use HasTypeAttribute<self>
     */
    use HasTypeAttribute;
    use HasStringValue;
}
