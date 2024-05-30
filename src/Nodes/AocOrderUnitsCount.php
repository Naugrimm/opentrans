<?php

namespace Naugrim\OpenTrans\Nodes;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<AocOrderUnitsCount>
 */
class AocOrderUnitsCount implements NodeInterface
{
    use HasSerializableAttributes;
    use HasTypeAttribute;
}
