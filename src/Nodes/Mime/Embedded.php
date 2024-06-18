<?php

namespace Naugrim\OpenTrans\Nodes\Mime;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasLangAttribute;

/**
 * @implements NodeInterface<Embedded>
 * @method self setLang(string $lang)
 * @method string getLang()
 * @method self setData(array|\Naugrim\OpenTrans\Nodes\Mime\Data $data)
 * @method \Naugrim\OpenTrans\Nodes\Mime\Data getData()
 * @method self setFileName(string $fileName)
 * @method string getFileName()
 * @method self setFileSize(int $fileSize)
 * @method int getFileSize()
 */
class Embedded implements NodeInterface
{
    use HasSerializableAttributes;
    use HasLangAttribute;

    #[Serializer\Expose]
    #[Serializer\Type(Data::class)]
    #[Serializer\SerializedName('MIME_DATA')]
    protected Data $data;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('FILE_NAME')]
    protected string $fileName;

    #[Serializer\Expose]
    #[Serializer\Type('int')]
    #[Serializer\SerializedName('FILE_SIZE')]
    protected int $fileSize;
}
