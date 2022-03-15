<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\OpenTrans\Nodes\Udx;
use Naugrim\OpenTrans\Nodes\UdxAggregate;
use Naugrim\OpenTrans\Nodes\UdxInterface;
use ReflectionClass;

trait HasUdxItems
{
    /**
     * @Serializer\SerializedName("ITEM_UDX")
     * @Serializer\Type ("Naugrim\OpenTrans\Nodes\UdxAggregate")
     * @var UdxAggregate
     */
    protected $udxItem;

    public function setUdxItems(array $udxItems): self
    {
        $this->udxItem = new UdxAggregate();

        foreach ($udxItems as $udxItem) {
            if (!$udxItem instanceof UdxInterface) {
                $udxItem = $this->convertToUdx($udxItem);
            }

            $this->udxItem->addUdx($udxItem);
        }

        return $this;
    }

    private function convertToUdx($udxItem): UdxInterface
    {
        if (!is_array($udxItem)) {
            throw new UnknownKeyException('Invalid UDX structure given, Expected array<string,string>.');
        }

        $udxData = $this->parseUdxData($udxItem);
        $udxClass = $udxData['class'];
        $reflection = new ReflectionClass($udxClass);
        if (!$reflection->implementsInterface(UdxInterface::class)) {
            throw new UnknownKeyException(sprintf('"%s" needs to implement UdxInterface', $udxClass));
        }

        unset($udxData['class']);

        /** @var Udx $udxInstance */
        $udxInstance = $reflection->newInstance();
        NodeBuilder::fromArray($udxData, $udxInstance);

        return $udxInstance;
    }

    /**
     * @param array<string, mixed> $udxData
     * @return array<string, string>
     * @throws UnknownKeyException
     */
    private function parseUdxData(array $udxData): array
    {
        $mandatoryKeys = [
            'vendor',
            'name',
            'value'
        ];

        $data = [];

        foreach ($mandatoryKeys as $key) {
            if (!array_key_exists($key, $udxData)) {
                throw new UnknownKeyException(
                    sprintf(
                        'Key "%s" is not available in UDX data. Expected one of [%s]',
                        $key,
                        implode(',', $mandatoryKeys)
                    )
                );
            }

            if (!is_scalar($udxData[$key])) {
                throw new InvalidArgumentException(
                    sprintf(
                        'UDX value of "%s" must be scalar, "%s" given',
                        $key,
                        is_object($udxData[$key]) ? get_class($udxData[$key]) : gettype($udxData[$key])
                    )
                );
            }

            $data[$key] = sprintf('%s', $udxData[$key]);
        }

        $data['class'] = $udxData['class'] ?? Udx::class;

        return $data;
    }
}
