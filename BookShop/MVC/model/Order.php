<?php
// c:\xampp\htdocs\BookSmart\BookShop\MVC\model\Order.php

class Order
{
    private $id;
    private $detailId;
    private $orderId;
    private $productId;
    private $userId;
    private $totalPrice;
    private $orderStatus;
    private $quantity;
    private $price;
    private $createdAt;
    private $productImage;
    private $productName;
    public $orderDetails = [];

    // ... (Getters and Setters for all properties) ...
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getDetailId()
    {
        return $this->detailId;
    }

    public function setDetailId($detailId)
    {
        $this->detailId = $detailId;
    }
    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }
    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }
    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    public function getProductImage()
    {
        return $this->productImage;
    }

    public function setProductImage($productImage)
    {
        $this->productImage = $productImage;
    }
    public function getProductName()
    {
        return $this->productName;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;
    }
    public function reset()
    {
        $this->id = null;
        $this->detailId = null;
        $this->orderId = null;
        $this->productId = null;
        $this->userId = null;
        $this->totalPrice = null;
        $this->orderStatus = null;
        $this->quantity = null;
        $this->price = null;
        $this->createdAt = null;
        $this->productImage = null;
        $this->productName = null;
        $this->orderDetails = [];
    }
}
?>
