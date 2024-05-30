<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\ControlInfo;

trait HasControlInfo
{
    /**
     *
     * @var ControlInfo
     */
    #[Serializer\Expose]
    #[Serializer\Type(\Naugrim\OpenTrans\Nodes\ControlInfo::class)]
    #[Serializer\SerializedName('CONTROL_INFO')]
    protected ControlInfo $controlInfo;
}
