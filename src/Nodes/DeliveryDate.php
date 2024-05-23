<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Party;

class DeliveryDate implements NodeInterface
{
    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('type')]
    #[Serializer\XmlAttribute]
    protected $type;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERY_START_DATE')]
    protected $deliveryStartDate;


    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERY_END_DATE')]
    protected $deliveryEndDate;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getDeliveryStartDate(): string
    {
        return $this->deliveryStartDate;
    }

    public function setDeliveryStartDate(string $deliveryStartDate): self
    {
        $this->deliveryStartDate = $deliveryStartDate;
        return $this;
    }

    public function getDeliveryEndDate(): string
    {
        return $this->deliveryEndDate;
    }

    public function setDeliveryEndDate(string $deliveryEndDate): self
    {
        $this->deliveryEndDate = $deliveryEndDate;
        return $this;
    }

}
