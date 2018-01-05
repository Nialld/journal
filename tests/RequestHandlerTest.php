<?php

use PHPUnit\Framework\TestCase;
use Journal\RequestHandler;

final class RequestHandlerTest extends TestCase {

	public function testCreate()
	{
		$rh = new RequestHandler();
		$this->assertNull($rh->getTag());

		$rh = new RequestHandler(['tag'=>'test']);
		$this->assertEquals('test', $rh->getTag());
	}

	public function testResponse() {
		$rh = new RequestHandler();
		$json = $rh->response();

		$data = json_decode($json, true);

		$this->assertNotFalse($data);

		$this->assertArrayHasKey('rendered', $data);
	}

}