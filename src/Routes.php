<?php

$router = new \Bramus\Router\Router();
$router->setNamespace('\App\Controllers');
$router->get('/', 'Toko@index');


$router->get('/admin', 'Admin@index');
$router->match('GET|POST','/admin/login', 'Admin@login');
$router->get('/admin/logout', 'Admin@logout');

$router->get('/admin/dashboard', 'Dashboard@index');
$router->get('/admin/supplier', 'Supplier@index');

$router->run();