<?php

namespace App\Tests\Comment\Domain\Entity;
use PHPUnit\Framework\TestCase;
use App\Comment\Domain\Entity\Comment;

class CommentTest extends TestCase {

    /** @test */
    public function aCommentCanBeCreated() {
        $comment = new Comment(1,'a','a','a');
        $this->assertInstanceOf(Comment::class, $comment);
    }

    private $id;
    private $userId;
    private $topicId;
    private $comment;

    /** @test */
    public function aCommentCanBeSerialized() {
        $comment = new Comment(1,'a','a','a');

        $this->assertJsonStringEqualsJsonString(
            '{
                "comment": {
                "userId": "1",
                "topicId": "a",
                "comment": "a"
                }
            } ',
            json_encode($comment)
        );
    }
}

?>