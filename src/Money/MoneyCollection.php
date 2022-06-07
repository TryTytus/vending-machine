<?php

namespace VendingMachine\Money;

use VendingMachine\Money\MoneyClass;
use VendingMachine\Money\MoneyCollectionInterface;
use VendingMachine\Money\MoneyInterface;

class MoneyCollection implements MoneyCollectionInterface {

    private $values = array();

    public function add(MoneyInterface $money): void
    {
        array_push($this->values, $money);
    }

    public function sum(): float
    {
        return array_reduce($this->values, function($x, $y) {
            $x += $y->getValue();
            return $x;
        });
    }

    public function toArray(): array
    {
        return $this->values;
    }

    public function merge(MoneyCollectionInterface $moneyCollection): void
    {
        $this->values = array_merge($this->values, $moneyCollection->toArray());
    }

    public function empty(): void
    {
        $this->values = array();
    }

}