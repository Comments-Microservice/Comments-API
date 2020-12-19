<?php 

namespace App\Tests\Comment\Infrastructure;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use App\Tests\Comment\Infrastructure\Fixtures\CommentFixture;
use App\Comment\Domain\CommentRepositoryInterface;

class CommentRepositoryTest extends WebTestCase {

    use FixturesTrait;
    /** @test */
    public function aCommentIsRetrievedFromTheDatastore() {

        # A comment will be created, with ID: 1 because it is the only one
        $this->loadFixtures([CommentFixture::class]);
        $commentRepository = $this->getRepository();

        $comment = $commentRepository->getCommentById(1);

        $this->assertEquals('a', $comment->getTopicId());
        $this->assertEquals('a', $comment->getUserId());
        $this->assertEquals('Hi Danny', $comment->getComment());
    }

    private function getRepository(): CommentRepositoryInterface {
        /** @var CommentRepository $repository */
        $repository = $this->bootKernel()->getContainer()->get('Test.CommentRepository');
        return $repository;
    }
}
?>