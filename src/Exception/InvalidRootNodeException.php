<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Exception;

use RuntimeException;

/**
 * Exception thrown when the root element of an XML document does not match the expected type.
 */
class InvalidRootNodeException extends RuntimeException
{
    public static function create(string $expectedRootElement, string $actualRootElement): self
    {
        return new self(
            sprintf(
                'Expected root element "%s" but found "%s"',
                $expectedRootElement,
                $actualRootElement
            )
        );
    }
}
