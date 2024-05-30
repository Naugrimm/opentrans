<?php

namespace Naugrim\OpenTrans\Nodes;

use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

class BankCode implements NodeInterface
{
    use HasSerializableAttributes;
    use HasTypeAttribute;
    use HasStringValue;

    public const TYPE_BIC = 'bic';
}
