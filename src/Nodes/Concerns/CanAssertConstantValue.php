<?php

namespace Naugrim\OpenTrans\Nodes\Concerns;

use InvalidArgumentException;
use ReflectionClass;
use Webmozart\Assert\Assert;

trait CanAssertConstantValue
{
    protected static function assertValidConstant(string $value, string $constantPrefix = ''): void
    {
        $constants = self::getClassConstants();
        if ($constants === []) {
            return;
        }

        foreach ($constants as $constant => $constantValue) {
            if ($constantValue === $value && ($constantPrefix === '' || $constantPrefix === '0' || str_starts_with($constant, $constantPrefix))) {
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
        $constants = (new ReflectionClass(static::class))->getConstants();
        Assert::allString($constants);
        
        return $constants;
    }
}
