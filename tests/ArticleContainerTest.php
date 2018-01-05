<?php

use PHPUnit\Framework\TestCase;
use Journal\ArticleContainer;
use Journal\Article;

final class ArticleContainerTest extends TestCase {

	public function testCreate()
	{
		$ac = new ArticleContainer();
		$this->assertInstanceOf(ArticleContainer::class, $ac);
	}

	public function testHydrate() {
		$data = file_get_contents(__DIR__ . '/data/sampleResponse.json');
		$ac = new ArticleContainer();
		$this->assertInstanceOf(ArticleContainer::class, $ac);
		$ac->hydrate($data);
		$this->assertEquals(9, $ac->count());
	}

	public function testIterate() {
		$data = file_get_contents(__DIR__ . '/data/sampleResponse.json');
		$ac = new ArticleContainer();
		$this->assertInstanceOf(ArticleContainer::class, $ac);
		$ac->hydrate($data);

		$titles = [];
		foreach ($ac as $article) {
			$titles[] = $article->getTitle();
		}

		$this->assertEquals("'Unprecedented demand' for Trump book in Ireland - but it won't be here till next week", $titles[0]);

	}

}