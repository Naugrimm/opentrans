<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\OpenTrans;

trait IsRootNode
{
    #[Serializer\Expose]
    #[Serializer\XmlAttribute]
    protected string $version = OpenTrans::OPENTRANS_VERSION;

    public function getXmlRootElementName(): string
    {
        $attributes = new \ReflectionClass(static::class)->getAttributes(Serializer\XmlRoot::class);

        if ($attributes === []) {
            throw new \RuntimeException('XmlRoot attribute not found on class ' . static::class);
        }

        $arguments = $attributes[0]->getArguments();

        if ($arguments === []) {
            throw new \RuntimeException('XmlRoot attribute has no arguments on class ' . static::class);
        }

        $rootElementName = $arguments[0];
        if (! is_string($rootElementName)) {
            throw new \RuntimeException('XmlRoot attribute first argument must be a string on class ' . static::class);
        }

        return $rootElementName;
    }
}
