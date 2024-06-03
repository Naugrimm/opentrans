<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\Nodes\ControlInfo;

trait HasControlInfo
{
    #[Serializer\Expose]
    #[Serializer\Type(ControlInfo::class)]
    #[Serializer\SerializedName('CONTROL_INFO')]
    protected ControlInfo $controlInfo;
}
