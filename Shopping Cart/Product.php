<?php


class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        if($id < 0) {
            throw new Exception("Id can not be less than 0");
        }
        $this->id =$id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title =$title;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        if($price < 1) {
            throw new Exception("Price can not be less than 1");
        }
        $this->price = $price;
    }
    public function getAvailableQuantity(){
        return $this->availableQuantity;
    }
    public function setAvailableQuantity($quantity){
        $this->availableQuantity = $quantity;
    }

    public function __construct($id, $title, $price, $availableQuantity=0)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Cart $cart
     * @param int $quantity
     * @return CartItem
     */
    public function addToCart(Cart $cart, int $quantity): CartItem
    {
        return $cart->addProduct($this, $quantity);;
    }

    /**
     * Remove product from cart
     *
     * @param Cart $cart
     */
    public function removeFromCart(Cart $cart)
    {
        //TODO Implement method
        $cart->removeProduct($this);
    }
}