<?php

namespace Naugrim\OpenTrans\Nodes\File;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\Nodes\Concerns\HasLangAttribute;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;
use Naugrim\OpenTrans\Nodes\NodeInterface;

class HashValue implements NodeInterface
{
    use HasTypeAttribute, HasStringValue, HasLangAttribute;
}