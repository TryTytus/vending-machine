<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use VendingMachine\Money\Money;

final class MoneyTest extends TestCase

{
    public function testMoney(): void
    {
        $money = new Money('Q');
        $this->assertSame($money->getCode(), 'Q');
        $this->assertSame($money->getValue(), 0.25);
    }
}