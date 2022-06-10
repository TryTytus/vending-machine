<?php

namespace VendingMachine;

use VendingMachine\Item\Item;
use VendingMachine\Item\ItemCodeInterface;
use VendingMachine\Item\ItemCollection;
use VendingMachine\Item\ItemInterface;
use VendingMachine\Money\MoneyCollection;
use VendingMachine\Money\MoneyCollectionInterface;
use VendingMachine\Money\MoneyInterface;

class VendingMachine implements VendingMachineInterface
{

    public $budget;
    public $items;

    public function __construct()
    {
        $this->budget = new MoneyCollection;
        $this->items = new ItemCollection;
    }

    public function addItem(ItemInterface $item): void
    {
        $this->items->add($item);
    }

    public function dropItem(ItemCodeInterface $itemCode): void
    {
        $this->items->products = array_filter(
            $this->items->products,
            fn (Item $x) => $x->getCode() != $itemCode
        );
    }

    public function insertMoney(MoneyInterface $money): void
    {
        $this->budget->add($money);
    }

    public function getCurrentTransactionMoney(): MoneyCollectionInterface
    {
        return $this->budget;
    }

    public function getInsertedMoney(): MoneyCollectionInterface
    {
        $to_return = clone $this->budget;
        $this->budget->empty();
        return $to_return;
    }
}
