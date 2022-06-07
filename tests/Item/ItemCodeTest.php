<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use VendingMachine\Item\ItemCode;


final class ItemCodeTest extends TestCase

{
    public function testCheck(): void
    {
        $item = new ItemCode('A');
        $this->assertSame(strval($item), 'A');

        $item = new ItemCode('B');
        $this->assertSame(strval($item), 'B');

        $item = new ItemCode('C');
        $this->assertSame(strval($item), 'C');
    }
}