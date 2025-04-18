<?php
class Product
{
    private $id, $productName, $price, $description, $image, $updated_at, $created_at;
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getProductName()
    {
        return $this->productName;
    }
    public function setProductname($productName)
    {
        $this->productName = $productName;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function getUpdated_at()
    {
        return $this->updated_at;
    }
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function reset()
    {
        $this->id = null;
        $this->image = null;
        $this->price = null;
        $this->description = null;
        $this->image = null;
    }
}
