<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use VendingMachine\Item\Item;
use VendingMachine\Item\ItemCode;


final class ItemTest extends TestCase
{
    public function testItem(): void
    {
        $itemCode = new ItemCode('A');
        $item = new Item(0.65, 1, $itemCode);

        $this->assertSame($item->getPrice(), 0.65);
        $this->assertSame($item->getCount(), 1);
        $this->assertSame(strval($item->getCode()), strval(new ItemCode('A')));

    }
}
