<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    public function getItems(){
        return $this->items;
    }
    public function setItems($items){
        $this->items = $items;
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        foreach($this->items as $item){
            if($item->getProduct()->getId() == $product->getId()) {
                $item->increaseQuantity($quantity);
                return $item;
            }
        }
        $newItem = new CartItem($product, $quantity);
        $this->items[] = $newItem;
        return $newItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        unset($this->items[$product->getId()]);
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $totalAmount = 0;
        foreach ($this->items as $item){
            $totalAmount += $item->getQuantity();
        }
        return $totalAmount;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $totalPrice = 0;
        foreach ($this->items as $item){
            $totalPrice += $item->getProduct()->getPrice() * $item->getQuantity();
        }
        return $totalPrice;
    }
}