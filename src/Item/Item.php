<?php 

namespace VendingMachine\Item;
use VendingMachine\Item\ItemInterface;


class Item implements ItemInterface {
    
    private float $price;
    public int $count;
    private ItemCode $code;

    public function __construct(float $price, int $count, ItemCode $code)
    {
        $this->price = $price;
        $this->count = $count;
        $this->code = $code;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getCode(): ItemCodeInterface
    {
        return $this->code;
    }

}