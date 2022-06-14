<?php

namespace VendingMachine\Action;

use VendingMachine\Exception\ItemNotFoundException;
use VendingMachine\Item\ItemCode;
use VendingMachine\Money\Money;
use VendingMachine\Money\MoneyCollection;
use VendingMachine\Response\Response;
use VendingMachine\VendingMachineInterface;
use VendingMachine\Response\ResponseInterface;

class Action implements ActionInterface

{
    private $action;

    public function __construct(string $action)
    {
        $this->action = $action;
    }

    public function getName(): string
    {
        return $this->action;
    }

    public function handle(VendingMachineInterface $vendingMachine): ResponseInterface
    {
        try {
        if (preg_match('/^GET-[A-C]{1}$/', $this->action)) {
            $item = $vendingMachine->items->get(new ItemCode($this->action[4]));
            if ($item->getCount() === 0) {
                throw new ItemNotFoundException();
            }
            $sum = intval($vendingMachine->budget->sum() * 100);
            if ($item->getPrice() > $sum) {
                return new Response("Not enough money.\n");
            }
            $sum -= intval($item->getPrice() * 100);
            $vendingMachine->budget->empty();
            $new_money_c = new MoneyCollection;
            $options = [
                'DOLLAR' => 100,
                'DIME' => 25,
                'Q' => 10,
                'N' => 5
            ];
            while ($sum > 0) {
                foreach ($options as $key => $value) {
                    if ($sum >= $value) {
                        $sum -= $value;
                        $new_money_c->add(new Money($key));
                        break;
                    }
                }
            }
            $vendingMachine->budget->merge($new_money_c);
            $vendingMachine->dropItem(new ItemCode($this->action[4]));
            return new Response($item->getCode() . "\n");
        } elseif ('RETURN-MONEY' === $this->action) {
            return new Response(join(', ', array_map(fn (Money $x) => $x->getCode(), $vendingMachine->getInsertedMoney()->toArray())) . "\n");
        } else {
            $vendingMachine->insertMoney(new Money($this->action));
            $sum = $vendingMachine->budget->sum();
            $money = join(', ', array_map(fn (Money $x) => $x->getCode(), $vendingMachine->getCurrentTransactionMoney()->toArray()));
            return new Response('Current balance: ' . $sum . ' (' . $money . ")\n");
        }
    } catch (ItemNotFoundException $e) {
        return new Response("Item not found. Please choose another item.\n");
    }
}
}
