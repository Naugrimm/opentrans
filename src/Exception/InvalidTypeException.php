<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Exception;

use InvalidArgumentException;

/**
 * Exception thrown when an invalid type parameter is provided to the SchemaValidator.
 */
class InvalidTypeException extends InvalidArgumentException
{
    public static function classDoesNotExist(string $className): self
    {
        return new self(
            sprintf('Class "%s" does not exist', $className)
        );
    }

    public static function classDoesNotImplementInterface(string $className, string $interfaceName): self
    {
        return new self(
            sprintf(
                'Class "%s" does not implement the required interface "%s"',
                $className,
                $interfaceName
            )
        );
    }
}
