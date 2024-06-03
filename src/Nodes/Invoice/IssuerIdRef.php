<?php

namespace Naugrim\OpenTrans\Nodes\Invoice;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @implements NodeInterface<IssuerIdRef>
 */
class IssuerIdRef implements NodeInterface
{
    use HasSerializableAttributes;
    /**
     * @use HasTypeAttribute<self>
     */
    use HasTypeAttribute;
    use HasStringValue;
}
