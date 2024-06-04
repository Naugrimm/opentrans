<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<ControlInfo>
 * @method self setStopAutomaticProcessing(string $stopAutomaticProcessing)
 * @method string getStopAutomaticProcessing()
 * @method self setGeneratorInfo(string $generatorInfo)
 * @method string getGeneratorInfo()
 * @method self setGeneratorDate(string $generatorDate)
 * @method string getGeneratorDate()
 */
class ControlInfo implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('STOP_AUTOMATIC_PROCESSING')]
    protected string $stopAutomaticProcessing;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('GENERATOR_INFO')]
    protected string $generatorInfo;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('GENERATION_DATE')]
    protected string $generatorDate;
}
