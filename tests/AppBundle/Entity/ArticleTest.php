<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Article;

class ArticleTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function it_can_be_constructed_with_the_id()
    {
        $article = new Article(1000);

        $this->assertEquals(null, $article->getId());
    }
}