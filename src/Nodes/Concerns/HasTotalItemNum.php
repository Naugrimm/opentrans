<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;

trait HasTotalItemNum
{
    #[Serializer\Expose]
    #[Serializer\SerializedName('TOTAL_ITEM_NUM')]
    #[Serializer\Type('int')]
    protected int $totalItemNum;
}
