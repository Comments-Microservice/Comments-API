<?php

namespace App\Comment\Infrastructure;
use Doctrine\ORM\EntityRepository;
use App\Comment\Domain\Entity\Comment;
use App\Comment\Domain\CommentRepositoryInterface;

class CommentRepository extends EntityRepository implements CommentRepositoryInterface {

    public function getCommentById($id):Comment {

        /** @var Comment $comment */
        $comment = $this->find($id);
        return $comment;
    }
}

?>