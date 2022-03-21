<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contact\Details;

class ContactDetails extends Details
{
    /**
     * @Serializer\SerializedName("bme:CONTACT_ID")
     */
    protected $id;

    /**
     * @Serializer\SerializedName("bme:CONTACT_NAME")
     */
    protected $name;

    /**
     * @Serializer\SerializedName("bme:FIRST_NAME")
     */
    protected $firstName;

    /**
     * @Serializer\SerializedName("bme:TITLE")
     */
    protected $title;

    /**
     * @Serializer\SerializedName("bme:ACADEMIC_TITLE")
     */
    protected $academicTitle;

    /**
     * @Serializer\SerializedName("bme:CONTACT_ROLE")
     */
    protected $role;

    /**
     * @Serializer\SerializedName("bme:CONTACT_DESCRIPTION")
     */
    protected $description;

    /**
     * @Serializer\SerializedName("bme:PHONE")
     */
    protected $phone;

    /**
     * @Serializer\SerializedName("bme:FAX")
     *
     */
    protected $fax;

    /**
     * @Serializer\SerializedName("bme:URL")
     *
     * @var string
     */
    protected $url;

    /**
     * @Serializer\SerializedName("bme:EMAILS")
     */
    protected $emails;
}
