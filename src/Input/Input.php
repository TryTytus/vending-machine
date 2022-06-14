<?php

namespace VendingMachine\Input;

use VendingMachine\Action\Action;
use VendingMachine\Action\ActionInterface;
use VendingMachine\Money\MoneyCollectionInterface;
use VendingMachine\VendingMachine;


class Input implements InputInterface
{   
    private $input;
    private $vending_machine;

    public function __construct($input, VendingMachine $vending_machine)
    {
        $this->input = $input;
        $this->vending_machine = $vending_machine;
    }

    public function getAction(): ActionInterface
    {
        return new Action($this->input);
    }

    public function getMoneyCollection(): MoneyCollectionInterface
    {
        return $this->vending_machine->getCurrentTransactionMoney();
    }
}