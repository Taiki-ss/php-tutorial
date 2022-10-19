<?php

use App\Controller\HomeController;
use DI\Bridge\Slim\Bridge;
use DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';

$builder = new ContainerBuilder();
$builder->addDefinitions( require __DIR__ . '/../config/config.php' );

$app = Bridge::create( $builder->build() );
$app->get( '/', array( HomeController::class, 'index' ) );
$app->addErrorMiddleware( true, true, true );
$app->run();
