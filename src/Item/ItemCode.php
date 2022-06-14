<?php

namespace VendingMachine\Item;
use VendingMachine\Item\ItemCodeInterface;


class ItemCode implements ItemCodeInterface {

    private string $code;

    public function __construct(string $value)
    {
        $this->code = $value;
    }

    public function __toString(): string
    {
        return $this->code;
    }
}
