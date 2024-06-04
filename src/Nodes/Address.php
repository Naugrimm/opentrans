<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Crypto\PublicKey;
use Naugrim\BMEcat\Nodes\Fax;
use Naugrim\BMEcat\Nodes\Phone;
use Naugrim\OpenTrans\Nodes\Contact\Details;

/**
 * @implements NodeInterface<Address>
 * @method self setName(string $name)
 * @method string getName()
 * @method self setName2(string $name2)
 * @method string getName2()
 * @method self setName3(string $name3)
 * @method string getName3()
 * @method self setDepartment(string $department)
 * @method string getDepartment()
 * @method self setContactDetails(\Naugrim\OpenTrans\Nodes\Contact\Details[]|array $contactDetails)
 * @method \Naugrim\OpenTrans\Nodes\Contact\Details[]|array getContactDetails()
 * @method self setStreet(string $street)
 * @method string getStreet()
 * @method self setZip(string $zip)
 * @method string getZip()
 * @method self setBoxno(string $boxno)
 * @method string getBoxno()
 * @method self setZipbox(string $zipbox)
 * @method string getZipbox()
 * @method self setCity(string $city)
 * @method string getCity()
 * @method self setState(string $state)
 * @method string getState()
 * @method self setCountry(string $country)
 * @method string getCountry()
 * @method self setCountryCoded(string $countryCoded)
 * @method string getCountryCoded()
 * @method self setVatId(string $vatId)
 * @method string getVatId()
 * @method self setTaxNumber(string $taxNumber)
 * @method string getTaxNumber()
 * @method self setPhone(\Naugrim\BMEcat\Nodes\Phone[]|array $phone)
 * @method \Naugrim\BMEcat\Nodes\Phone[]|array getPhone()
 * @method self setFax(\Naugrim\BMEcat\Nodes\Fax[]|array $fax)
 * @method \Naugrim\BMEcat\Nodes\Fax[]|array getFax()
 * @method self setEmails(string $emails)
 * @method string getEmails()
 * @method self setPublicKey(\Naugrim\BMEcat\Nodes\Crypto\PublicKey[]|array $publicKey)
 * @method \Naugrim\BMEcat\Nodes\Crypto\PublicKey[]|array getPublicKey()
 * @method self setUrl(string $url)
 * @method string getUrl()
 * @method self setAddressRemarks(string $addressRemarks)
 * @method string getAddressRemarks()
 */
class Address implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('NAME')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $name;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('NAME2')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $name2;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('NAME3')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $name3;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DEPARTMENT')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $department;

    /**
     * @var Details[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Details::class . '>')]
    #[Serializer\XmlList(entry: 'CONTACT_DETAILS', inline: true)]
    protected array $contactDetails = [];

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('STREET')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $street;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ZIP')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $zip;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('BOXNO')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $boxno;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ZIPBOX')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $zipbox;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CITY')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $city;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('STATE')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $state;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('COUNTRY')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $country;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('COUNTRY_CODED')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $countryCoded;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('VAT_ID')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $vatId;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('TAX_NUMBER')]
    protected string $taxNumber;

    /**
     * @var Phone[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Phone::class . '>')]
    #[Serializer\XmlList(entry: 'PHONE', inline: true, namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected array $phone = [];

    /**
     * @var Fax[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Fax::class . '>')]
    #[Serializer\XmlList(entry: 'FAX', inline: true, namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected array $fax = [];

    /**
     * @var string[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<string>')]
    #[Serializer\XmlList(entry: 'EMAIL', inline: true, namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected array $emails = [];

    /**
     * @var PublicKey[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . PublicKey::class . '>')]
    #[Serializer\XmlList(entry: 'PUBLIC_KEY', inline: true, namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected array $publicKey = [];

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('URL')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $url;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ADDRESS_REMARKS')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected string $addressRemarks;
}
