<?php

namespace App\Comment\Infrastructure;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\Comment\Domain\ValueObject\CommentUpsertedEvent;


class CommentEventBus implements MessageHandlerInterface {

    public function __invoke(CommentUpsertedEvent $event) {
        echo 'Sending Upserted Event now';
    }

}
?>