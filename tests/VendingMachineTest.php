<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use VendingMachine\Item\Item;
use VendingMachine\Item\ItemCode;
use VendingMachine\Money\Money;
use VendingMachine\VendingMachine;

final class VendingMachineTest extends TestCase

{
    public function testVendingMachine()
    {
        $machine = new VendingMachine;
        $item = new Item(0.65, 1, new ItemCode('A'));
        $machine->addItem($item);

        $this->assertSame($machine->items->count(new ItemCode('A')), 1);
        $machine->dropItem(new ItemCode('A'));
        $this->assertSame($machine->items->count(new ItemCode('A')), 0);

        $machine->insertMoney(new Money('DOLLAR'));
        $this->assertSame($machine->getCurrentTransactionMoney()->sum(), 1.0);
        $machine->getInsertedMoney();
        $this->assertSame($machine->getCurrentTransactionMoney()->sum(), 0.0);
    }
}
