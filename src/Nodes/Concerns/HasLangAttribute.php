<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasLangAttribute
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("lang")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected string $lang;

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     * @return NodeInterface
     */
    public function setLang(string $lang): NodeInterface
    {
        $this->lang = $lang;
        /** @var NodeInterface $this */
        return $this;
    }
}
