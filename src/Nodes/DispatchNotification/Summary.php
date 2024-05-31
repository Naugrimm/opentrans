<?php

namespace Naugrim\OpenTrans\Nodes\DispatchNotification;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\AllowOrChargesFix;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;

/**
 * @implements NodeInterface<Summary>
 */
#[Serializer\AccessorOrder(order: 'custom', custom: ['totalItemNum'])]
class Summary implements NodeInterface
{
    use HasSerializableAttributes;
    use HasTotalItemNum;
}
