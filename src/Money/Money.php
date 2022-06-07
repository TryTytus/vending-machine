<?php

namespace VendingMachine\Money;

use VendingMachine\Money\MoneyInterface;

class Money implements MoneyInterface {


    private float $value;
    private string $code;

    public function __construct($code)
    {
        $options = [
            'DOLLAR' => 1.0,
            'DIME' => 0.1,
            'Q' => 0.25,
            'N' => 0.05
        ];

        $this->value = $options[$code];
        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}