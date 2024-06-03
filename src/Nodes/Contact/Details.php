<?php

namespace Naugrim\OpenTrans\Nodes\Contact;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contact\Role;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Fax;
use Naugrim\BMEcat\Nodes\Phone;
use Naugrim\OpenTrans\Nodes\Emails;
use Naugrim\OpenTrans\OpenTrans;

/**
 * @implements NodeInterface<Details>
 */
class Details implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CONTACT_ID')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    public string $id;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CONTACT_NAME')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $name;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('FIRST_NAME')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $firstName;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('TITLE')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $title;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ACADEMIC_TITLE')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $academicTitle;

    /**
     * @var Role[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Role::class . '>')]
    #[Serializer\XmlList(entry: 'CONTACT_ROLE', inline: true)]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected array $role = [];

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CONTACT_DESCR')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $contactDescr;

    /**
     * @var Phone[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Phone::class . '>')]
    #[Serializer\XmlList(entry: 'PHONE', inline: true, namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected array $phone = [];

    #[Serializer\Expose]
    #[Serializer\Type(Fax::class)]
    #[Serializer\SerializedName('FAX')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected Fax $fax;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('URL')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected string $url;

    #[Serializer\Expose]
    #[Serializer\Type(Emails::class)]
    #[Serializer\SerializedName('EMAILS')]
    #[Serializer\XmlElement(namespace: OpenTrans::BMECAT_NAMESPACE)]
    protected Emails $emails;
}
