<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;

class Address extends \Naugrim\BMEcat\Nodes\Address
{
    /**
     * @Serializer\SerializedName("bme:NAME")
     */
    protected $name;

    /**
     * @Serializer\SerializedName("bme:NAME2")
     */
    protected $name2;

    /**
     * @Serializer\SerializedName("bme:NAME3")
     */
    protected $name3;

    /**
     * @Serializer\SerializedName("bme:DEPARTMENT")
     */
    protected $department;

    /**
     * @Serializer\SerializedName("CONTACT_DETAILS")
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\ContactDetails")
     */
    protected $contactDetails;

    /**
     * @Serializer\SerializedName("bme:STREET")
     */
    protected $street;

    /**
     * @Serializer\SerializedName("bme:ZIP")
     */
    protected $zip;

    /**
     * @Serializer\SerializedName("bme:BOXNO")
     */
    protected $boxno;

    /**
     * @Serializer\SerializedName("bme:ZIPBOX")
     */
    protected $zipbox;

    /**
     * @Serializer\SerializedName("bme:CITY")
     */
    protected $city;

    /**
     * @Serializer\SerializedName("bme:COUNTRY")
     */
    protected $country;

    /**
     * @Serializer\SerializedName("bme:COUNTRY_CODED")
     */
    protected $countryCoded;

    /**
     * @Serializer\SerializedName("bme:VAT_ID")
     */
    protected $vatId;

    /**
     * @Serializer\SerializedName("bme:PHONE")
     */
    protected $phone;

    /**
     * @Serializer\SerializedName("bme:FAX")
     */
    protected $fax;

    /**
     * @Serializer\SerializedName("bme:EMAIL")
     */
    protected $email;

    /**
     * @Serializer\SerializedName("bme:PUBLIC_KEY")
     */
    protected $publicKey;

    /**
     * @Serializer\SerializedName("bme:URL")
     */
    protected $url;

    /**
     * @Serializer\SerializedName("bme:ADDRESS_REMARKS")
     */
    protected $addressRemarks;
}
