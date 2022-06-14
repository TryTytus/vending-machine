<?php 

namespace VendingMachine\Item;

use VendingMachine\Exception\ItemNotFoundException;

class ItemCollection implements ItemCollectionInterface
{
    public $products = array();

    public function add(ItemInterface $item): void
    {
        array_push($this->products, $item);
    }

    public function get(ItemCodeInterface $itemCode): ItemInterface
    {
        foreach ($this->products as $product) {
            if ($product->getCode() == $itemCode) {
                return $product;
            }
        }
        throw new ItemNotFoundException();
    }

    public function count(ItemCodeInterface $itemCode): int
    {
        $counter = 0;
        foreach ($this->products as $product) {
            if ($product->getCode() == $itemCode) {
                $counter += $product->getCount();
            }
        }
        return $counter;
    }

    public function empty(): void
    {
        $this->products = array();
    }
}