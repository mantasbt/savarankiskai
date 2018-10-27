<?php
class ShoppingCart
{
  private $items;
  private $date = null;

  public function addItems(ShoppingCartItem $item){
      $this->items = $item;
  }
  public function getItems(){
    return $this->items;
  }
}

class ShoppingCartItem
{
    var $id = null;
    var $price = null;
    var $quantity = null;
    var $name = null;
}


$cart = new ShoppingCart;
$item = new ShoppingCartItem;
$item->name = "Muilas";
$item->price = 3;
$item->quantity = 1;
$item->id = 1;

$cart->addItems($item);
var_dump($cart->getItems());




class Drink
{
    protected $name = null;

    protected function setDrinkName($name){
        $this->name = $name;
    }
    public function getDrinkName(){
        return $this->name;
    }
}

class Coffee extends Drink
{
    function __construct(){
        $this->name = "Coffee";
    }
}

$drink = new Coffee;
echo "My new drink is: ".$drink->getDrinkName();