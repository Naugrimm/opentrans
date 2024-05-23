<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\OpenTrans;

trait IsRootNode
{
    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("xmlns:bme")
     * @Serializer\XmlAttribute
     */
    protected $bmecatNamespace = OpenTrans::BMECAT_NAMESPACE;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("xmlns")
     * @Serializer\XmlAttribute
     */
    protected $opentransNamespace = OpenTrans::OPENTRANS_NAMESPACE;

    /**
     * @Serializer\Expose
     * @Serializer\XmlAttribute
     */
    protected $version = OpenTrans::OPENTRANS_VERSION;
}
