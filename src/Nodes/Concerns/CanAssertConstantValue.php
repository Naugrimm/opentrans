<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use InvalidArgumentException;
use ReflectionClass;

trait CanAssertConstantValue
{
    protected static function assertValidConstant(string $value, string $constantPrefix = ''): void
    {
        $constants = static::getClassConstants();
        if (empty($constants)) {
            return;
        }

        foreach ($constants as $constant => $constantValue) {
            if ($constantValue === $value && (empty($constantPrefix) || strpos($constant, $constantPrefix) === 0)) {
                return;
            }
        }

        throw new InvalidArgumentException(
            sprintf(
                'Constant value "%s" is not publicly available in class "%s"',
                $value,
                static::class
            )
        );
    }

    /**
     * @return array<string,string>
     */
    private static function getClassConstants(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }
}
