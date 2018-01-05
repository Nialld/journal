<?php

namespace Journal;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use League\Plates\Engine;

class Controller {

	/**
	 * Controller for handling the request for / and /{tag}
	 * @param ServerRequestInterface $request
	 * @param ResponseInterface $response
	 * @param array $args
	 * @return ResponseInterface
	 */
	public function indexAction(ServerRequestInterface $request, ResponseInterface $response, array $args)
	{
		$templateEngine = new Engine(APP_PATH . '/src/Journal/Templates');
		$requestHandler = new RequestHandler($args);

		$articleContainer = new ArticleContainer();

		try {
			$articleContainer->hydrate($requestHandler->response());
			$response->getBody()->write($templateEngine->render('list', ['articles'=>$articleContainer]));
		}catch (\Exception $e) {
			$response->getBody()->write($templateEngine->render('error'));
			$response->withStatus(500);
		}
		return $response;
	}
}