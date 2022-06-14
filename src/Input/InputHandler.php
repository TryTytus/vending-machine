<?php

namespace VendingMachine\Input;

use VendingMachine\Exception\InvalidInputException;
use VendingMachine\VendingMachine;
use VendingMachine\VendingMachineInterface;

class InputHandler implements InputHandlerInterface
{
    public $vending_machine;

    public function __construct(VendingMachine $vending_machine)
    {
        $this->vending_machine = $vending_machine;
    }

    public function getInput(): InputInterface
    {
        $command = readline("Input: ");
        if (preg_match('/^GET-[A-C]{1}$/', $command) || $command === 'RETURN-MONEY' || preg_match('/^(Q|N|DOLLAR|DIME)$/', $command) ) {
            return new Input($command, $this->vending_machine);
        } else {
            throw new InvalidInputException();
        }
    }
}
