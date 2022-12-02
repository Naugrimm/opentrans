<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Tests\Nodes\Payment;

use DateTime;
use Naugrim\OpenTrans\Nodes\Account;
use Naugrim\OpenTrans\Nodes\BankAccount;
use Naugrim\OpenTrans\Nodes\BankCode;
use Naugrim\OpenTrans\Nodes\Payment\Card;
use Naugrim\OpenTrans\Nodes\Payment\Payment;
use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase
{
    public function testIbanAccountPayment(): void
    {
        $payment = Payment::createIbanPayment(
            'DE123456789001234',
            'me',
            'Testbank',
            'ABCDEF00',
            'DE'
        );

        $this->assertCount(1, $payment->getAccounts());
        $this->assertNull($payment->getCard());
        $this->assertFalse($payment->isCash());
        $this->assertFalse($payment->isCheck());
        $this->assertFalse($payment->isDebit());

        $account = $payment->getAccounts()[0];
        $this->assertInstanceOf(Account::class, $account);
        $this->assertEquals('DE123456789001234', $account->getBankAccount()->getValue());
        $this->assertEquals(BankAccount::TYPE_IBAN, $account->getBankAccount()->getType());
        $this->assertEquals(BankCode::TYPE_BIC, $account->getBankCode()->getType());
        $this->assertEquals('ABCDEF00', $account->getBankCode()->getValue());
        $this->assertEquals('Testbank', $account->getBankName());
        $this->assertEquals('DE', $account->getBankCountry());
        $this->assertEquals('me', $account->getHolder());
    }

    public function testCardPayment(): void
    {
        $payment = Payment::createCardPayment(
            Card::AMERICAN_EXPRESS,
            '12345',
            'me',
            new DateTime('2025-01-01')
        );

        $this->assertNull($payment->getAccounts());
        $this->assertInstanceOf(Card::class, $payment->getCard());
        $this->assertFalse($payment->isCash());
        $this->assertFalse($payment->isCheck());
        $this->assertFalse($payment->isDebit());
    }

    public function testCashPayment(): void
    {
        $payment = Payment::createCashPayment();

        $this->assertNull($payment->getAccounts());
        $this->assertNull($payment->getCard());
        $this->assertTrue($payment->isCash());
        $this->assertFalse($payment->isCheck());
        $this->assertFalse($payment->isDebit());
    }

    public function testCheckPayment(): void
    {
        $payment = Payment::createCheckPayment();

        $this->assertNull($payment->getAccounts());
        $this->assertNull($payment->getCard());
        $this->assertFalse($payment->isCash());
        $this->assertTrue($payment->isCheck());
        $this->assertFalse($payment->isDebit());
    }

    public function testDebitPayment(): void
    {
        $payment = Payment::createDebitPayment();

        $this->assertNull($payment->getAccounts());
        $this->assertNull($payment->getCard());
        $this->assertFalse($payment->isCash());
        $this->assertFalse($payment->isCheck());
        $this->assertTrue($payment->isDebit());
    }
}
