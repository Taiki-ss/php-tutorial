<?php
use DI\Bridge\Slim\Bridge;
use DI\ContainerBuilder;
use Psr\Http\Message\ResponseInterface as Response;
use Twig\Environment as Twig;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/../vendor/autoload.php';

$builder = new ContainerBuilder();
$builder->addDefinitions(
	array(
		Twig::class => function() {
			$loader = new FilesystemLoader( __DIR__ . '/../resource/templates' );
			return new Twig(
				$loader,
				array(
					'cache' => __DIR__ . '/../var/chache/twig',
				)
			);
		},
	)
);

$app = Bridge::create( $builder->build() );
$app->get(
	'/',
	function ( Response $response, Twig $twig ) {
		$response = $response->withHeader( 'Content-type', 'text/html' );
		$body     = $twig->render( 'index.html.twig' );
		$response->getBody()->write( $body );
		return $response;
	}
);

$app->run();
