<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Tests\Nodes\Payment;

use InvalidArgumentException;
use Naugrim\OpenTrans\Nodes\Payment\PaymentTerm;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class PaymentTermTest extends TestCase
{
    /**
     * @return array{type: string}[]
     */
    public static function provideValidTypes(): array
    {
        $reflection = new ReflectionClass(PaymentTerm::class);
        return array_map(
            // @phpstan-ignore argument.type
            static fn (string $type): array => [
                'type' => $type,
            ],
            array_values($reflection->getConstants())
        );
    }

    /**
     * @dataProvider provideValidTypes
     */
    public function testCreate(string $type): void
    {
        $this->assertInstanceOf(PaymentTerm::class, PaymentTerm::create($type, 'test'));
    }

    public function testCreateWithInvalidType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        PaymentTerm::create('abc', 'foo');
    }
}
