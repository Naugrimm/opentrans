<?php

namespace Naugrim\OpenTrans\Nodes\Mime;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasLangAttribute;

/**
 * @implements NodeInterface<Embedded>
 */
class Embedded implements NodeInterface
{
    use HasSerializableAttributes;
    use HasLangAttribute;

    /**
     *
     * @var Data
     */
    #[Serializer\Expose]
    #[Serializer\Type(Data::class)]
    #[Serializer\SerializedName('MIME_DATA')]
    protected Data $data;

    /**
     *
     * @var string
     */
    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('FILE_NAME')]
    protected string $fileName;

    /**
     *
     * @var int
     */
    #[Serializer\Expose]
    #[Serializer\Type('int')]
    #[Serializer\SerializedName('FILE_SIZE')]
    protected int $fileSize;
}
