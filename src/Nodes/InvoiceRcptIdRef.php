<?php

namespace Naugrim\OpenTrans\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttributeAndValue;

class InvoiceRcptIdRef implements NodeInterface
{
    use HasTypeAttributeAndValue;
}
