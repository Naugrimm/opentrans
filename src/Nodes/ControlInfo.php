<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class ControlInfo implements NodeInterface
{
    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('STOP_AUTOMATIC_PROCESSING')]
    protected string $stopAutomaticProcessing;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('GENERATOR_INFO')]
    protected string $generatorInfo;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('GENERATOR_DATE')]
    protected string $generatorDate;

    /**
     * @return string
     */
    public function getStopAutomaticProcessing(): string
    {
        return $this->stopAutomaticProcessing;
    }

    /**
     * @param string $stopAutomaticProcessing
     * @return ControlInfo
     */
    public function setStopAutomaticProcessing(string $stopAutomaticProcessing): ControlInfo
    {
        $this->stopAutomaticProcessing = $stopAutomaticProcessing;
        return $this;
    }

    /**
     * @return string
     */
    public function getGeneratorInfo(): string
    {
        return $this->generatorInfo;
    }

    /**
     * @param string $generatorInfo
     * @return ControlInfo
     */
    public function setGeneratorInfo(string $generatorInfo): ControlInfo
    {
        $this->generatorInfo = $generatorInfo;
        return $this;
    }

    /**
     * @return string
     */
    public function getGeneratorDate(): string
    {
        return $this->generatorDate;
    }

    /**
     * @param string $generatorDate
     * @return ControlInfo
     */
    public function setGeneratorDate(string $generatorDate): ControlInfo
    {
        $this->generatorDate = $generatorDate;
        return $this;
    }
}
