<?php

namespace Naugrim\OpenTrans\Nodes\OrderChange;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;
use Naugrim\OpenTrans\Nodes\ControlInfo;

/**
 * @Serializer\AccessorOrder("custom", custom = {"controlInfo", "info"})
 */
class Header implements NodeInterface
{
    use HasControlInfo;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\OrderChange\Info")
     * @Serializer\SerializedName("ORDERCHANGE_INFO")
     *
     * @var Info
     */
    protected $info;

    /**
     * @return Info
     */
    public function getInfo(): Info
    {
        return $this->info;
    }

    /**
     * @param Info $info
     * @return Header
     */
    public function setInfo(Info $info): Header
    {
        $this->info = $info;
        return $this;
    }
}
