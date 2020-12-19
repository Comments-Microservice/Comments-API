<?php 

namespace App\Comment\Domain\ValueObject;
use App\Comment\Domain\ValueObject\Comment;

class CommentUpsertedEvent {

    private $data;

    public function __construct(Comment $comment) {
        $this->data = $comment;
    }

    public function getData():Comment {
        return $this->data;
    }
}

?>