<?php

namespace Journal;

class ArticleContainer implements \Iterator {

	private $_position = 0;
	private $_items = [];

	public function __construct() {
		$this->_position = 0;
	}

	public function rewind() {
		$this->_position = 0;
	}

	public function current() {
		return $this->_items[$this->_position];
	}

	public function key() {
		return $this->_position;
	}

	public function next() {
		++$this->_position;
	}

	public function valid() {
		return isset($this->_items[$this->_position]);
	}

	public function addArticle(Article $article) {
		$this->_items[] = $article;
	}

	public function hydrate($jsonString) {
		$data = json_decode($jsonString, true);
		foreach($data['response']['articles'] as $article) {
			if ($article['type'] == 'post') {
				$this->addArticle(new Article($article));
			}
		}
	}

	public function count() {
		return count($this->_items);
	}

}