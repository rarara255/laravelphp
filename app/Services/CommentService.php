<?php
namespace App\Services;

use App\Models\Comment;
class CommentService
{
    public function createComment(array $data)
    {
        try {
            $comment = Comment::create($data);
            return $comment;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function updateComment(Comment $comment, array $data)
    {
        $comment->update($data);
        return $comment;
    }
}
