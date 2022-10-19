<?php
use Twig\Environment as Twig;
use Twig\Loader\FilesystemLoader;

return array(
	Twig::class => function () {
		$loader = new FilesystemLoader( __DIR__ . '/../resource/templates' );
		return new Twig(
			$loader,
			array(
				'cache' => __DIR__ . '/../var/cache/twig',
			)
		);
	},
);
