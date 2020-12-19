<?php

namespace App\Comment\Infrastructure;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Comment\Domain\CommentRepositoryInterface;

class CommentEndpoint extends AbstractController {

    private $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository) {
        $this->commentRepository = $commentRepository;
    }
    public function getCommentAsJson(int $commentId): JsonResponse {

        /** @var Comment $comment */
        $comment = $this->commentRepository->getCommentById($commentId);
        return new JsonResponse($comment);
    }
}

?>