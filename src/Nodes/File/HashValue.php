<?php

namespace Naugrim\OpenTrans\Nodes\File;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasLangAttribute;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @implements \Naugrim\BMEcat\Nodes\Contracts\NodeInterface<HashValue>
 */
class HashValue implements NodeInterface
{
    use HasSerializableAttributes;
    use HasTypeAttribute;
    use HasStringValue;
    use HasLangAttribute;
}
