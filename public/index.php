<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('dashboard', ['controller' => 'Home', 'action' => 'index']);

$router->add('stock'        ,['controller' => 'Stock', 'action' => 'index']);
$router->add('stock/edit'   ,['controller' => 'Stock', 'action' => 'edit']);
$router->add('stock/detail' ,['controller' => 'Stock', 'action' => 'detail']);

$router->add('property',        ['controller' => 'Property', 'action' => 'index']);
$router->add('property/edit',   ['controller' => 'Property', 'action' => 'edit']);
$router->add('property/detail', ['controller' => 'Property', 'action' => 'detail']);

$router->add('account',        ['controller' => 'Account', 'action' => 'index']);
$router->add('account/edit',   ['controller' => 'Account', 'action' => 'edit']);
$router->add('account/detail', ['controller' => 'Account', 'action' => 'detail']);


$router->add('asset',        ['controller' => 'Asset', 'action' => 'index']);
$router->add('asset/edit',   ['controller' => 'Asset', 'action' => 'edit']);
$router->add('asset/detail', ['controller' => 'Asset', 'action' => 'detail']);


$router->add('companies',        ['controller' => 'Corprate', 'action' => 'index']);
$router->add('companies/edit',   ['controller' => 'Corprate', 'action' => 'edit']);
$router->add('companies/detail', ['controller' => 'Corprate', 'action' => 'detail']);

$router->add('{controller}/{action}');

$router->add('stats/dailyTotalGraph'        ,['controller' => 'Stats', 'action' => 'dailyTotalGraph']);
$router->add('stats/dailyStockTotalGraph'   ,['controller' => 'Stats', 'action' => 'dailyStockTotalGraph']);
$router->add('stats/dailyPropertyTotalGraph',['controller' => 'Stats', 'action' => 'dailyPropertyTotalGraph']);
$router->add('statistics',        ['controller' => 'Statistics', 'action' => 'index']);

$router->dispatch($_SERVER['QUERY_STRING']);

//echo"<pre>" . print_r($router->getParams(),true); echo"</pre>";