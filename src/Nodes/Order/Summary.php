<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @Serializer\AccessorOrder("custom", custom = {"totalItemNum", "totalAmount"})
 */
class Summary implements NodeInterface
{
    use HasTotalItemNum, HasTotalAmount;
}
