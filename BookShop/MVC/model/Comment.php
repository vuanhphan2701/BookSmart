<?php
// MVC/model/Comment.php
class Comment
{
    private $id;
    private $productId;
    private $userId;
    private $image;

    private $userName;
    private $commentText;
    private $createdAt;

    // Constructor
    public function __construct()
    {
        // Initialize properties if needed
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getProductId()
    {
        return $this->productId;
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function getUserName()
    {
        return $this->userName;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getCommentText()
    {
        return $this->commentText;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    public function setCommentText($commentText)
    {
        $this->commentText = $commentText;
    }
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    public function reset()
    {
        $this->id = null;
        $this->productId = null;
        $this->userId = null;
        $this->image = null;
        $this->userName = null;
        $this->commentText = null;
        $this->createdAt = null;
    }
}
?>
