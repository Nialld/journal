<?php

use PHPUnit\Framework\TestCase;
use Journal\Article;

final class ArticleTest extends TestCase {

	public function testCreateInvalid1()
	{
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Title is not a string or Empty');

		$article = [
			'title' => '',
			'excerpt' => '',
			'images' => ['thumbnail' => ['image'=>'']],
			'type' => '',
			'author' => ['name'=>'','twitter'=>''],
			'slug' => '',
		];

		$a = new Article($article);
	}

	public function testCreateInvalid2()
	{
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Title is not a string or Empty');

		$article = [
			'title' => 123,
		];
		$a = new Article($article);
	}

	public function testCreateInvalid3()
	{
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Image is not a value URL');

		$article = [
			'title' => 'title',
			'excerpt' => 'excerpt',
			'images' => ['thumbnail' => ['image'=>'not a url']],
			'type' => '',
			'author' => ['name'=>'','twitter'=>''],
			'slug' => '',
		];

		$a = new Article($article);
	}

	public function testCreateOk() {
		$article = [
			'title' => 'title',
			'excerpt' => 'excerpt',
			'images' => ['thumbnail' => ['image'=>'https://avatars1.githubusercontent.com/u/932419?s=40&v=4']],
			'type' => 'post',
			'author' => ['name'=>'Niall','twitter'=>'niallodawson'],
			'slug' => 'all-about-niall',
			'date_unix' => time(),
			'permalink' => 'http://www.thejournal.ie',
		];
		$a = new Article($article);
		$this->assertEquals(true, $a->canRender());

		$article = [
			'title' => 'title',
			'excerpt' => 'excerpt',
			'images' => ['thumbnail' => ['image'=>'https://avatars1.githubusercontent.com/u/932419?s=40&v=4']],
			'type' => 'notpost',
			'author' => ['name'=>'Niall','twitter'=>'niallodawson'],
			'slug' => 'all-about-niall',
			'date_unix' => time(),
			'permalink' => 'http://www.thejournal.ie',
		];
		$a = new Article($article);
		$this->assertEquals(false, $a->canRender());
	}

}