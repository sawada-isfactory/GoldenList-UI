<?php
use Cake\Routing\Router;

Router::plugin(
    'GoldenList',
    ['path' => '/golden-list'],
    function ($routes) {
		$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        $routes->fallbacks('DashedRoute');
    }
);
