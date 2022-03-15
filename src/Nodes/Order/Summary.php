<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;

/**
 * @Serializer\AccessorOrder("custom", custom = {"totalItemNum", "totalAmount"})
 */
class Summary implements NodeInterface
{
    use HasTotalItemNum, HasTotalAmount;
}
