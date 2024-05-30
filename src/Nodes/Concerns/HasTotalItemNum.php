<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasTotalItemNum
{
    #[Serializer\Expose]
    #[Serializer\SerializedName('TOTAL_ITEM_NUM')]
    #[Serializer\Type('int')]
    protected int $totalItemNum;
}
