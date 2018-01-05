<?php

namespace Journal;

use GuzzleHttp\Client;

class RequestHandler {

	private $_args = [];

	public function __construct(array $args = []) {
		$this->_args = $args;
	}

	public function getTag() {
		return isset($this->_args['tag']) ? $this->_args['tag'] : null;
	}

	/**
	 * @return Client
	 */
	private function createClient() {

		$username = 'sample';
		$password = 'eferw5wr335£65';
		$publication = 'thejournal'; // i cant see anywhere in the spec how this can change

		if (isset($this->_args['tag'])) {
			$uri = "http://api.thejournal.ie/v3/sample/tag/{$this->_args['tag']}";
		}else{
			$uri = "http://api.thejournal.ie/v3/sample/$publication/";
		}

		$options = [];
		$options['base_uri'] = $uri;
		$options['auth'] = [$username, $password];
		$options['http_errors'] = false;
		$client = new Client($options);
		return $client;
	}

	public function response() {
		$client = $this->createClient();
		$response = $client->get('GET');

		while ($response->getStatusCode() == 429) { // check for throttling
			sleep(5);
			$response = $client->get('GET');
		}

		return $response->getBody()->getContents();
	}
}