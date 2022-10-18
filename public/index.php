<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->get(
	'/',
	function ( Request $request, Response $response ) {
		$response = $response->withHeader( 'Content-type', 'application/json' );
		$response->getBody()->write(
			json_encode(
				array( 'message' => 'Hello World' ),
			)
		);
		return $response;
	}
);

$app->run();
