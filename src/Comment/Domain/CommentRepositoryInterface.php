<?php

namespace App\Comment\Domain;
use App\Comment\Domain\Entity\Comment;

interface CommentRepositoryInterface {

    public function getCommentById(int $id): Comment;
}

?>