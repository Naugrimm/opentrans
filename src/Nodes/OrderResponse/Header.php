<?php

namespace Naugrim\OpenTrans\Nodes\OrderResponse;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;

/**
 * @Serializer\AccessorOrder("custom", custom = {"controlInfo", "info"})
 */
class Header implements NodeInterface
{
    use HasControlInfo;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\OrderResponse\Info")
     * @Serializer\SerializedName("ORDERRESPONSE_INFO")
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
