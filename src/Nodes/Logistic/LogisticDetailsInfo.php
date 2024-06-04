<?php

namespace Naugrim\OpenTrans\Nodes\Logistic;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasSerializableAttributes;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Logistic\Country;
use Naugrim\BMEcat\Nodes\Logistic\MeansOfTransport;
use Naugrim\BMEcat\Nodes\Logistic\Transport;

/**
 * @implements NodeInterface<self>
 * @method self setCountryOfOrigin(\Naugrim\BMEcat\Nodes\Logistic\Country[]|array $countryOfOrigin)
 * @method \Naugrim\BMEcat\Nodes\Logistic\Country[]|array getCountryOfOrigin()
 * @method self setTransport(\Naugrim\BMEcat\Nodes\Logistic\Transport[]|array $transport)
 * @method \Naugrim\BMEcat\Nodes\Logistic\Transport[]|array getTransport()
 * @method self setPackages(\Naugrim\OpenTrans\Nodes\Logistic\Package[]|array $packages)
 * @method \Naugrim\OpenTrans\Nodes\Logistic\Package[]|array getPackages()
 * @method self setMeansOfTransport(\Naugrim\BMEcat\Nodes\Logistic\MeansOfTransport[]|array $meansOfTransport)
 * @method \Naugrim\BMEcat\Nodes\Logistic\MeansOfTransport[]|array getMeansOfTransport()
 */
class LogisticDetailsInfo implements NodeInterface
{
    use HasSerializableAttributes;

    /**
     * @var Country[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Country::class . '>')]
    #[Serializer\XmlList(entry: 'COUNTRY_OF_ORIGIN', inline: true)]
    protected array $countryOfOrigin = [];

    /**
     * @var Transport[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . Transport::class . '>')]
    #[Serializer\XmlList(entry: 'TRANSPORT', inline: true)]
    protected array $transport = [];

    /**
     * @var Package[]
     */
    #[Serializer\Expose]
    #[Serializer\SerializedName('PACKAGE_INFO')]
    #[Serializer\Type('array<' . Package::class . '>')]
    #[Serializer\XmlList(entry: 'PACKAGE', inline: false)]
    protected array $packages = [];

    /**
     * @var MeansOfTransport[]
     */
    #[Serializer\Expose]
    #[Serializer\Type('array<' . MeansOfTransport::class . '>')]
    #[Serializer\XmlList(entry: 'MEANS_OF_TRANSPORT', inline: true)]
    protected array $meansOfTransport = [];
}
