<?php

namespace Naugrim\OpenTrans\Nodes\Contact;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contact\Role;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Fax;
use Naugrim\BMEcat\Nodes\Phone;
use Naugrim\OpenTrans\Nodes\Emails;

class Details implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:CONTACT_ID")
     *
     * @var string
     */
    public $id;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:CONTACT_NAME")
     *
     * @var string
     */
    protected $name;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:FIRST_NAME")
     *
     * @var string
     */
    protected $firstName;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:TITLE")
     *
     * @var string
     */
    protected $title;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:ACADEMIC_TITLE")
     *
     * @var string
     */
    protected $academicTitle;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Contact\Role")
     * @Serializer\SerializedName("bme:CONTACT_ROLE")
     *
     * @var Role
     */
    protected $role;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:CONTACT_DESCRIPTION")
     *
     * @var string
     */
    protected $description;
    
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Phone")
     * @Serializer\SerializedName("bme:PHONE")
     *
     * @var Phone
     */
    protected $phone;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Fax")
     * @Serializer\SerializedName("bme:FAX")
     *
     * @var Fax
     */
    protected $fax;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("bme:URL")
     *
     * @var string
     */
    protected $url;
    
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Emails")
     * @Serializer\SerializedName("bme:EMAILS")
     *
     * @var Emails
     */
    protected $emails;


    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Details
     */
    public function setId(string $id): Details
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Details
     */
    public function setName(string $name): Details
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Details
     */
    public function setFirstName(string $firstName): Details
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Details
     */
    public function setTitle(string $title): Details
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getAcademicTitle(): string
    {
        return $this->academicTitle;
    }

    /**
     * @param string $academicTitle
     * @return Details
     */
    public function setAcademicTitle(string $academicTitle): Details
    {
        $this->academicTitle = $academicTitle;
        return $this;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @param Role $role
     * @return Details
     */
    public function setRole(Role $role): Details
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Details
     */
    public function setDescription(string $description): Details
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }

    /**
     * @param Phone $phone
     * @return Details
     */
    public function setPhone(Phone $phone): Details
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return Fax
     */
    public function getFax(): Fax
    {
        return $this->fax;
    }

    /**
     * @param Fax $fax
     * @return Details
     */
    public function setFax(Fax $fax): Details
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Details
     */
    public function setUrl(string $url): Details
    {
        $this->url = $url;
        return $this;
    }

    public function getEmails(): Emails
    {
        return $this->emails;
    }

    public function setEmails(Emails $emails): Details
    {
        $this->emails = $emails;
        return $this;
    }
}
