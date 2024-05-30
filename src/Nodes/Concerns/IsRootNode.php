<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\OpenTrans;

trait IsRootNode
{
    #[Serializer\Expose]
    #[Serializer\XmlAttribute]
    protected string $version = OpenTrans::OPENTRANS_VERSION;
}
