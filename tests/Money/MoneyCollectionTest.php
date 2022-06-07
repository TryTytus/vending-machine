<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use VendingMachine\Money\Money;
use VendingMachine\Money\MoneyCollection;

final class MoneyCollectionTest extends TestCase

{
    public function testMoneyCollection(): void
    {
        $money = new MoneyCollection();

        $money->add(new Money('DOLLAR'));
        $money->add(new Money('DOLLAR'));
        $this->assertEquals($money->toArray(), [
            new Money('DOLLAR'),
            new Money('DOLLAR')
        ]);
        echo $money->sum();
        $this->assertEquals($money->sum(), 2.0);

        $money2 = new MoneyCollection();
        $money2->add(new Money('Q'));
        $money2->add(new Money('Q'));
        $money->merge($money2);

        $this->assertEquals($money->toArray(), [
            new Money('DOLLAR'),
            new Money('DOLLAR'),
            new Money('Q'),
            new Money('Q')
        ]);
    }
}
