<?php

namespace Naugrim\OpenTrans\Nodes;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @implements NodeInterface<AocOrderUnitsCount>
 */
class AocOrderUnitsCount implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     * @use HasTypeAttribute<self>
     */
    use HasTypeAttribute;
}
