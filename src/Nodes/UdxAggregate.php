<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;

class UdxAggregate
{
    /**
     * @var array<UdxInterface>
     */
    #[Serializer\XmlKeyValuePairs]
    #[Serializer\Inline]
    protected array $values = [];

    public function addUdx(UdxInterface $udx): self
    {
        $this->values[$this->createElementName($udx)] = $udx;

        return $this;
    }

    private function createElementName(UdxInterface $udx): string
    {
        return sprintf('UDX.%s.%s', $udx->getVendor(), $udx->getName());
    }
}
