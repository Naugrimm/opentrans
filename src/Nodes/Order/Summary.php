<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;

/**
 * @implements NodeInterface<Summary>
 * @method self setTotalItemNum(int $totalItemNum)
 * @method int getTotalItemNum()
 * @method self setTotalAmount(float $totalAmount)
 * @method float getTotalAmount()
 */
#[Serializer\AccessorOrder(order: 'custom', custom: ['totalItemNum', 'totalAmount'])]
class Summary implements NodeInterface
{
    use HasSerializableAttributes;
    use HasTotalItemNum;
    use HasTotalAmount;
}
