<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use VendingMachine\Item\Item;
use VendingMachine\Item\ItemCode;
use VendingMachine\Item\ItemCollection;

final class ItemCollectionTest extends TestCase {
    public function testItemCollection(): void
    {
        $collection = new ItemCollection;
        $item1 = new Item(0.65, 1, new ItemCode('A'));
        $item2 = new Item(1.0, 2, new ItemCode('B'));

        $collection->add($item1);
        $collection->add($item2);

        $this->assertSame($collection->get(new ItemCode('A')), $item1);
        $this->assertSame($collection->count(new ItemCode('B')), 2);
    }
}