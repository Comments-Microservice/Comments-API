<?php

namespace App\Tests\Comment\Domain\ValueObject;
use PHPUnit\Framework\TestCase;
use App\Comment\Domain\ValueObject\Comment;

class CommentTest extends TestCase {

    /** @test */
    public function aCommentCanBeCreated() {
        $comment = new Comment('a','a','a');
        $this->assertEquals('a', $comment->getTopicId());
        $this->assertEquals('a', $comment->getComment());
        $this->assertEquals('a', $comment->getUserId());
    }

    // /** @test */
    // public function aCommentCanBeSerialized() {
    //     $comment = new Comment(1,'a','a','a');

    //     $this->assertJsonStringEqualsJsonString(
    //         '{
    //             "comment": {
    //             "userId": "1",
    //             "topicId": "a",
    //             "comment": "a"
    //             }
    //         } ',
    //         json_encode($comment)
    //     );
    // }
}

?>