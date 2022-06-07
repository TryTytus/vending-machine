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

    // function __construct(string $user_input)
    // {
    //     $values = ['A', 'B', 'C'];
    //     $keys = array_map(fn($x) => 'GET-' . $x, $values);
    //     $this->value = array_combine($keys, $values)[$user_input];
    // }

    // public function __toString(): string
    // {
    //     return $this->value;
    // }
}
