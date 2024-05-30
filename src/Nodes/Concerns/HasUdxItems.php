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
     * @var UdxAggregate
     */
    #[Serializer\SerializedName('ITEM_UDX')]
    #[Serializer\Type(UdxAggregate::class)]
    protected UdxAggregate $udxItem;

    /**
     * @param UdxInterface[]|array{vendor: string, name: string, value: string}[] $udxItems
     * @throws UnknownKeyException
     */
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

    /**
     * @param array{vendor: string, name: string, value: string} $udxItem
     * @throws UnknownKeyException
     * @throws \Naugrim\BMEcat\Exception\InvalidSetterException
     * @throws \ReflectionException
     */
    private function convertToUdx(array $udxItem): UdxInterface
    {
        $udxData = $this->parseUdxData($udxItem);
        $udxClass = $udxData['class'];
        if (! class_exists($udxClass)) {
            throw new UnknownKeyException(sprintf('"%s" needs to implement UdxInterface', $udxClass));
        }

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
     * @template TData of array<string, mixed>
     * @param TData $udxData
     * @return non-empty-array<'class'|'name'|'value'|'vendor', non-falsy-string>
     */
    private function parseUdxData(array $udxData): array
    {
        $mandatoryKeys = [
            'vendor',
            'name',
            'value',
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
                        get_debug_type($udxData[$key])
                    )
                );
            }

            $data[$key] = sprintf('%s', $udxData[$key]);
        }

        if (isset($udxData['class']) && is_string($udxData['class']) && class_exists($udxData['class'])) {
            $data['class'] = $udxData['class'];
        } else {
            $data['class'] = Udx::class;
        }

        return $data;
    }
}
