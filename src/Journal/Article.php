<?php

namespace Journal;

class Article {

	private $_title = null;
	private $_excerpt = null;
	private $_image = null;
	private $_type = null;
	private $_authorName = null;
	private $_authorTwitter = null;
	private $_slug = null;
	private $_date = null;
	private $_permalink = null;

	public function __construct(array $article) {
		$title = $article['title'] ?? '';
		$excerpt = $article['excerpt'] ?? '';
		$image = $article['images']['thumbnail']['image'] ?? '';
		$type = $article['type'] ?? '';
		$authorName = $article['author']['name'] ?? '';
		$authorTwitter = $article['author']['twitter'] ?? '';
		$slug = $article['slug'] ?? '';
		$date = $article['date_unix'] ?? '';
		$permalink = $article['permalink'] ?? '';

		if (!is_string($title) || empty($title)) {
			throw new \Exception('Title is not a string or Empty');
		}
		if (!is_string($excerpt) || empty($excerpt)) {
			throw new \Exception('Excerpt is not a string or Empty');
		}
		if (!is_string($image) || empty($image)) {
			throw new \Exception('Image is not a string or Empty');
		}
		if (!filter_var($image, FILTER_VALIDATE_URL)) {
			throw new \Exception('Image is not a value URL');
		}
		if (!is_string($type) || empty($type)) {
			throw new \Exception('Type is not a string or Empty');
		}
		if (!is_string($authorName) || empty($authorName)) {
			throw new \Exception('authorName is not a string or Empty');
		}
		if (!is_string($authorTwitter)) {
			throw new \Exception('authorTwitter is not a string');
		}
		if (!is_string($slug) || empty($slug)) {
			throw new \Exception('Slug is not a string or Empty');
		}
		if (!is_integer($date) || empty($date)) {
			throw new \Exception('Date is not an Integer or Empty');
		}
		if (!is_string($permalink) || empty($permalink)) {
			throw new \Exception('Permalink is not a string or Empty');
		}
		if (!filter_var($permalink, FILTER_VALIDATE_URL)) {
			throw new \Exception('Permalink is not a value URL');
		}
		$this->_title = $title;
		$this->_excerpt = $excerpt;
		$this->_image = $image;
		$this->_type = $type;
		$this->_authorName = $authorName;
		$this->_authorTwitter = $authorTwitter;
		$this->_slug = $slug;
		$this->_date = $date;
		$this->_permalink = $permalink;
	}

	public function getTitle() {
		return $this->_title;
	}

	public function getExcerpt() {
		return $this->_excerpt;
	}

	public function getImage() {
		return $this->_image;
	}

	public function getType() {
		return $this->_type;
	}

	public function getAuthorName()
	{
		return $this->_authorName;
	}

	public function getAuthorTwitter()
	{
		return $this->_authorTwitter ?: 'thejournal_ie';
	}

	public function getSlug()
	{
		return $this->_slug;
	}

	public function getPermalink()
	{
		return $this->_permalink;
	}

	public function getDate($format = false)
	{
		return $format ? date($format, $this->_date) : $this->_date;
	}

	public function canRender() {
		return $this->getType() == 'post';
	}
}