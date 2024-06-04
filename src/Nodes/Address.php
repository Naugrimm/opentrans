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
 * @method self setName(string|null $name)
 * @method string|null getName()
 * @method self setName2(string|null $name2)
 * @method string|null getName2()
 * @method self setName3(string|null $name3)
 * @method string|null getName3()
 * @method self setDepartment(string|null $department)
 * @method string|null getDepartment()
 * @method self setContactDetails(\Naugrim\OpenTrans\Nodes\Contact\Details[]|array $contactDetails)
 * @method \Naugrim\OpenTrans\Nodes\Contact\Details[]|array getContactDetails()
 * @method self setStreet(string|null $street)
 * @method string|null getStreet()
 * @method self setZip(string|null $zip)
 * @method string|null getZip()
 * @method self setBoxno(string|null $boxno)
 * @method string|null getBoxno()
 * @method self setZipbox(string|null $zipbox)
 * @method string|null getZipbox()
 * @method self setCity(string|null $city)
 * @method string|null getCity()
 * @method self setState(string|null $state)
 * @method string|null getState()
 * @method self setCountry(string|null $country)
 * @method string|null getCountry()
 * @method self setCountryCoded(string|null $countryCoded)
 * @method string|null getCountryCoded()
 * @method self setVatId(string|null $vatId)
 * @method string|null getVatId()
 * @method self setTaxNumber(string|null $taxNumber)
 * @method string|null getTaxNumber()
 * @method self setPhone(\Naugrim\BMEcat\Nodes\Phone[]|array $phone)
 * @method \Naugrim\BMEcat\Nodes\Phone[]|array getPhone()
 * @method self setFax(\Naugrim\BMEcat\Nodes\Fax[]|array $fax)
 * @method \Naugrim\BMEcat\Nodes\Fax[]|array getFax()
 * @method self setEmails(array $emails)
 * @method string[] getEmails()
 * @method self setPublicKey(\Naugrim\BMEcat\Nodes\Crypto\PublicKey[]|array $publicKey)
 * @method \Naugrim\BMEcat\Nodes\Crypto\PublicKey[]|array getPublicKey()
 * @method self setUrl(string|null $url)
 * @method string|null getUrl()
 * @method self setAddressRemarks(string|null $addressRemarks)
 * @method string|null getAddressRemarks()
 */
class Address implements NodeInterface
{
    use HasSerializableAttributes;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('NAME')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $name = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('NAME2')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $name2 = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('NAME3')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $name3 = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('DEPARTMENT')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $department = null;

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
    protected ?string $street = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ZIP')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $zip = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('BOXNO')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $boxno = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ZIPBOX')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $zipbox = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('CITY')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $city = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('STATE')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $state = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('COUNTRY')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $country = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('COUNTRY_CODED')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $countryCoded = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('VAT_ID')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $vatId = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('TAX_NUMBER')]
    protected ?string $taxNumber = null;

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
    protected ?string $url = null;

    #[Serializer\Expose]
    #[Serializer\Type('string')]
    #[Serializer\SerializedName('ADDRESS_REMARKS')]
    #[\JMS\Serializer\Annotation\XmlElement(namespace: \Naugrim\OpenTrans\OpenTrans::BMECAT_NAMESPACE)]
    protected ?string $addressRemarks = null;
}
