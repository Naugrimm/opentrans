<?php

namespace Naugrim\OpenTrans\Nodes;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @implements NodeInterface<Remarks>
 */
class Remarks implements NodeInterface
{
    use HasSerializableAttributes;

    /**
     * @use HasTypeAttribute<Remarks>
     */
    use HasTypeAttribute;
    use HasStringValue;
}
