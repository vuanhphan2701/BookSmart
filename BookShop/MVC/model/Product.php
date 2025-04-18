<?php
class Product
{
    private $id, $productName, $price, $description, $image, $category_id,  $book_type, $author, $ISBN, $book_format, $publisher;

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
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function getBookType()
    {
        return $this->book_type;
    }

    public function setBookType($book_type)
    {
        $this->book_type = $book_type;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getISBN()
    {
        return $this->ISBN;
    }

    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }

    public function getBookFormat()
    {
        return $this->book_format;
    }

    public function setBookFormat($book_format)
    {
        $this->book_format = $book_format;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }


    public function reset()
    {
        $this->id = null;
        $this->image = null;
        $this->price = null;
        $this->description = null;
        $this->image = null;
        $this->category_id = null;
        $this->book_type = null;
        $this->author = null;
        $this->ISBN = null;
        $this->book_format = null;
        $this->publisher = null;
    }
}
