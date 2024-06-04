<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @implements NodeInterface<SourcingInfo>
 * @method self setManufacturerIdRef(array|\Naugrim\OpenTrans\Nodes\IdRef $manufacturerIdRef)
 * @method \Naugrim\OpenTrans\Nodes\IdRef getManufacturerIdRef()
 * @method self setManufacturerPid(string $manufacturerPid)
 * @method string getManufacturerPid()
 * @method self setManufacturerTypeDescr(string|null $manufacturerTypeDescr)
 * @method string|null getManufacturerTypeDescr()
 */
class ManufacturerInfo implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type(IdRef::class)]
    #[Serializer\SerializedName('MANUFACTURER_IDREF')]
    #[Serializer\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected IdRef $manufacturerIdRef;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MANUFACTURER_PID')]
    #[Serializer\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $manufacturerPid;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('MANUFACTURER_TYPE_DESCR')]
    #[Serializer\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $manufacturerTypeDescr = null;
}
