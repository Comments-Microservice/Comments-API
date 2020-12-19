<?php
namespace App\Tests\Comment\Domain\ValueObject;
use App\Comment\Domain\ValueObject\Comment;
use App\Comment\Domain\ValueObject\CommentUpsertedEvent;
use PHPUnit\Framework\TestCase;
use SimpleBus\SymfonyBridge\Bus\EventBus;

class CommentUpsertedEventTest extends TestCase {

    /** @test */
    public function aCommentUpsertedEventCanBeCreated() {

        $comment = new Comment('a','b','c');
        $event = new CommentUpsertedEvent($comment);

        $this->assertEquals($comment, $event->getData());
    }
}

?>