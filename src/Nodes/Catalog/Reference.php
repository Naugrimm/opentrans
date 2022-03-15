<?php

namespace Naugrim\OpenTrans\Nodes\Catalog;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class Reference implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CATALOG_ID")
     *
     * @var string
     */
    protected $id;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CATALOG_VERSION")
     *
     * @var string
     */
    protected $version;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CATALOG_NAME")
     *
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Reference
     */
    public function setId(string $id): Reference
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return Reference
     */
    public function setVersion(string $version): Reference
    {
        $this->version = $version;
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
     * @return Reference
     */
    public function setName(string $name): Reference
    {
        $this->name = $name;
        return $this;
    }
}
