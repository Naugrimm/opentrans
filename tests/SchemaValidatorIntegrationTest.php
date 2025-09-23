<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Tests;

use Naugrim\OpenTrans\Exception\InvalidTypeException;
use Naugrim\OpenTrans\Nodes\Order;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\TestCase;

/**
 * Integration test to demonstrate the complete type validation flow
 */
class SchemaValidatorIntegrationTest extends TestCase
{
    public function testCompleteValidationFlow(): void
    {
        // Test 1: Valid class and matching XML - should work (may fail on schema validation, but that's expected)
        $validXml = '<?xml version="1.0" encoding="UTF-8"?><ORDER xmlns="http://www.opentrans.org/XMLSchema/2.1" version="2.1"></ORDER>';
        
        try {
            SchemaValidator::isValid($validXml, '2.1', Order::class);
            $this->addToAssertionCount(1); // Type validation passed
        } catch (InvalidTypeException $e) {
            $this->fail('Type validation should have passed: ' . $e->getMessage());
        } catch (\Exception) {
            // Other exceptions (like schema validation) are acceptable for this test
            $this->addToAssertionCount(1);
        }

        // Test 2: Invalid class - should fail with InvalidTypeException
        try {
            SchemaValidator::isValid($validXml, '2.1', 'NonExistentClass');
            $this->fail('Should have thrown InvalidTypeException for non-existent class');
        } catch (InvalidTypeException $invalidTypeException) {
            $this->assertStringContainsString('does not exist', $invalidTypeException->getMessage());
        }

        // Test 3: Class that doesn't implement interface - should fail with InvalidTypeException
        try {
            SchemaValidator::isValid($validXml, '2.1', \stdClass::class);
            $this->fail('Should have thrown InvalidTypeException for class not implementing interface');
        } catch (InvalidTypeException $invalidTypeException) {
            $this->assertStringContainsString('does not implement the required interface', $invalidTypeException->getMessage());
        }
    }
}
