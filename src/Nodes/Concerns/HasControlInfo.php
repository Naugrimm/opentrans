<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use Naugrim\OpenTrans\Nodes\ControlInfo;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasControlInfo
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\ControlInfo")
     * @Serializer\SerializedName("CONTROL_INFO")
     *
     * @var ControlInfo
     */
    protected $controlInfo;

    /**
     * @return ControlInfo
     */
    public function getControlInfo(): ControlInfo
    {
        return $this->controlInfo;
    }

    /**
     * @param ControlInfo $controlInfo
     * @return NodeInterface
     */
    public function setControlInfo(ControlInfo $controlInfo): NodeInterface
    {
        $this->controlInfo = $controlInfo;
        /** @var NodeInterface $this */
        return $this;
    }
}
