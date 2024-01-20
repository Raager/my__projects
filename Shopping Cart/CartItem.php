<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    public function getProduct(){
        return $this->product;
    }
    public function setProduct(Product $product) {
        $this->product = $product;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity(int $quantity) {
        if($quantity < 0) {
            throw new Exception("Quantity can not be less than 0");
        }
        $this->quantity = $quantity;
    }

    public function __construct(Product $product, int $quantity = 1)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function increaseQuantity(int $amount = 1 )
    {
        if($amount < 1) {
            throw new Exception("Increase mean add!");
        }
        if(($this->quantity + $amount) > $this->product->getAvailableQuantity() ){
            throw new Exception("Can not increase quantity becouse it is more then availeble quantity");
        }
        $this->quantity += $amount;
    }

    public function decreaseQuantity(int $amount)
    {
        if($amount < 1) {
            throw new Exception("Decrease mean get less!");
        }
        if(($this->quantity - $amount) < 1 ){
            throw new Exception("Quantity can not be less then 1");
        }
        $this->quantity -= $amount;
    }
}