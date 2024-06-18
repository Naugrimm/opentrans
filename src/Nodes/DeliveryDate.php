<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

/**
 * @implements NodeInterface<DeliveryDate>
 * @method self setType(string $type)
 * @method string getType()
 * @method self setDeliveryStartDate(string $deliveryStartDate)
 * @method string getDeliveryStartDate()
 * @method self setDeliveryEndDate(string $deliveryEndDate)
 * @method string getDeliveryEndDate()
 */
class DeliveryDate implements NodeInterface
{
    use HasSerializableAttributes;

    /**
     * @use HasTypeAttribute<self>
     */
    use HasTypeAttribute;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERY_START_DATE')]
    protected string $deliveryStartDate;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DELIVERY_END_DATE')]
    protected string $deliveryEndDate;
}
