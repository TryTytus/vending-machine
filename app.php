<?php

// Implement me

require './vendor/autoload.php';

use VendingMachine\Input\InputHandler;
use VendingMachine\Item\Item;
use VendingMachine\Item\ItemCode;
use VendingMachine\VendingMachine;

$vm = new VendingMachine;


foreach ([
    'A' => 0.65,
    'B' => 1.0,
    'C' => 1.5
    ] as $name => $price) {
    $vm->addItem(new Item($price, 1, new ItemCode($name)));
}

while (true) {
    $inputHandler = new InputHandler($vm);
    $input = $inputHandler->getInput();
    $action = $input->getAction();
    echo $action->handle($vm);
}
