<?php

namespace App\Tests\Comment\Infrastructure;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use App\Comment\Infrastructure\CommentPostEndpoint;

class CommentPostEndpointTest extends WebTestCase {

    /** @test */
    public function aCommentCanBePosted() {
        
        $client = $this->createClient();
        $request = $client->request(
            'POST',
            '/api/comment/postcomment',
            [
                'topicId' => 'B',
                'userId' => 'A',
                'comment' => 'Hi Guys'
            ]
        );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('success', $client->getResponse()->getContent());
    }

    /** @test */
    public function endpointReturnsFailedWhenNoPostDataGiven() {
        
        $client = $this->createClient();
        $request = $client->request(
            'POST',
            '/api/comment/postcomment',
            []
        );
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('failed', $client->getResponse()->getContent());        
    }

    /** @test */
    public function endpointCreatesAnEventOnTheEventBus() {

        $eventBus = $this->bootKernel()->getContainer()->get('Test.event_bus');
        $serializer = self::bootKernel()->getContainer()->get('jms_serializer');

        $endpoint = new CommentPostEndpoint($eventBus);

        $request = new Request([],[
            'topicId' => 'B',
            'userId' => 'A',
            'comment' => 'Hello'
        ]);

        $endpoint->createComment($request);

        $this->assertEquals('success', $endpoint->createComment($request));
    }
}

?>