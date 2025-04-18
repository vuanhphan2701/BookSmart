<?php
// MVC/repository/CommentRepository.php

class CommentRepository extends Repository
{
    private $db = null;
    private $commentModel = null;

    function __construct()
    {
        $this->db = new Repository();
        $this->commentModel = new Comment();
    }

    public function getCommentsByProductId($productId)
    {
        $comments = [];
        $lists = $this->db
            ->setquery("SELECT c.*, u.image FROM comments c JOIN users u ON c.user_id = u.id WHERE product_id = ? ORDER BY created_at DESC")
            ->loadrows([$productId]);
        foreach ($lists as $value) {
            $this->mapDataToModel(
                $value,
                [
                    'id',
                    'product_id',
                    'user_id',
                    'user_name',
                    'image',
                    'comment_text',
                    'created_at'
                ]
            );
            $comments[] = clone $this->commentModel;
            $this->commentModel->reset();
        }
        return $comments;
    }

    public function addComment($productId, $userId, $userName, $commentText)
    {
        return $this->db
            ->setquery("INSERT INTO comments (product_id, user_id, user_name, comment_text) VALUES (?, ?, ?, ?)")
            ->save([$productId, $userId, $userName, $commentText]);
    }

    public function deleteComment($commentId)
    {
        return $this->db
            ->setquery("DELETE FROM comments WHERE id = ?")
            ->save([$commentId]);
    }

    public function editComment($commentId, $newText)
    {
        return $this->db
            ->setquery("UPDATE comments SET comment_text = ? WHERE id = ?")
            ->save([$newText, $commentId]);
    }
    //----------------------------------------------- MAP DATA TO MODEL  -----------------------------------------------------------
    function mapDataToModel($value, $fields = [])
    {
        if (empty($fields) || in_array('id', $fields)) {
            $this->commentModel->setId($value->id);
        }
        if (empty($fields) || in_array('product_id', $fields)) {
            $this->commentModel->setProductId($value->product_id);
        }
        if (empty($fields) || in_array('user_id', $fields)) {
            $this->commentModel->setUserId($value->user_id);
        }
        if (empty($fields) || in_array('image', $fields)) {
            $this->commentModel->setImage($value->image);
        }
        if (empty($fields) || in_array('user_name', $fields)) {
            $this->commentModel->setUserName($value->user_name);
        }
        if (empty($fields) || in_array('comment_text', $fields)) {
            $this->commentModel->setCommentText($value->comment_text);
        }
        if (empty($fields) || in_array('created_at', $fields)) {
            $this->commentModel->setCreatedAt($value->created_at);
        }
    }
}
