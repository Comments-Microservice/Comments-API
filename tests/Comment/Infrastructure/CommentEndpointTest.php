<?php

namespace App\Tests\Comment\Infrastructure;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class CommentEndpointTest extends WebTestCase {

    /** @test */
    public function ACommentIsRetrievedFromTheEndpoint() {
        $client = $this->createClient();
        $request = $client->request(
            'GET',
            '/api/comment/comment/1'
        );

        var_dump($client->getResponse()->getContent());

        $this->assertJsonStringEqualsJsonString(
            file_get_contents( __DIR__.'/Fixtures/response.json'),
            $client->getResponse()->getContent());
    }
}

?>