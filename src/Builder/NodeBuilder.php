<?php

namespace Naugrim\OpenTrans\Builder;

use Naugrim\OpenTrans\Exception\InvalidSetterException;
use Naugrim\OpenTrans\Exception\UnknownKeyException;
use Naugrim\OpenTrans\Nodes\NodeInterface;
use ReflectionException;
use ReflectionMethod;

class NodeBuilder
{
    /**
     * @param array $data
     * @param NodeInterface $instance
     * @return NodeInterface
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public static function fromArray(array $data, NodeInterface $instance)
    {
        foreach ($data as $name => $value) {
            $setterName = 'set'.ucfirst($name);
            if (!method_exists($instance, $setterName)) {
                throw new UnknownKeyException('There is no setter for the property '.$name.' in the class '.get_class($instance));
            }

            if (is_scalar($value) || is_object($value)) {
                $instance->$setterName($value);
                continue;
            }


            // if the value is an array, try to recursively construct the object

            try {
                $reflectionMethod = new ReflectionMethod($instance, $setterName);
                $setterParams = $reflectionMethod->getParameters();
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new InvalidSetterException('Reflecting the setter method '.get_class($instance).'::'.$setterName.' failed.');
            }
            // @codeCoverageIgnoreEnd
            $firstSetterParam = array_shift($setterParams);
            if (!$firstSetterParam) {
                throw new InvalidSetterException('The setter for the property '.$name.' in the class '.get_class($instance).' must have exactly one argument.');
            }

            if (!$firstSetterParam->getType()) {
                throw new InvalidSetterException('The setter for the property '.$name.' in the class '.get_class($instance).' must have exactly one argument and this argument must have a type hint.');
            }

            $paramType = $firstSetterParam->getType()->getName();
            $valueType = gettype($value);

            if ($paramType !== $valueType && class_exists($paramType)) {
                $value = self::fromArray($value, new $paramType);
            }

            $instance->$setterName($value);
        }

        return $instance;
    }
}
