<?php

namespace App\Tests\Comment\Infrastructure\Fixtures;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use App\Comment\Domain\Entity\Comment;

# Fixtures are loading content in the database for us perTest
class CommentFixture extends AbstractFixture implements ORMFixtureInterface{

    public function load(ObjectManager $manager) {
        $comment = new Comment('a','a','Hi Danny');

        $manager->persist($comment);
        $manager->flush();
    }
}

?>