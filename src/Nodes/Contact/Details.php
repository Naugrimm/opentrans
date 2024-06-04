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
 * @method self setName(string $name)
 * @method string getName()
 * @method self setFirstName(string $firstName)
 * @method string getFirstName()
 * @method self setTitle(string $title)
 * @method string getTitle()
 * @method self setAcademicTitle(string $academicTitle)
 * @method string getAcademicTitle()
 * @method self setRole(\Naugrim\BMEcat\Nodes\Contact\Role[]|array $role)
 * @method \Naugrim\BMEcat\Nodes\Contact\Role[]|array getRole()
 * @method self setContactDescr(string $contactDescr)
 * @method string getContactDescr()
 * @method self setPhone(\Naugrim\BMEcat\Nodes\Phone[]|array $phone)
 * @method \Naugrim\BMEcat\Nodes\Phone[]|array getPhone()
 * @method self setFax(array|\Naugrim\BMEcat\Nodes\Fax $fax)
 * @method \Naugrim\BMEcat\Nodes\Fax getFax()
 * @method self setUrl(string $url)
 * @method string getUrl()
 * @method self setEmails(array|\Naugrim\OpenTrans\Nodes\Emails $emails)
 * @method \Naugrim\OpenTrans\Nodes\Emails getEmails()
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
