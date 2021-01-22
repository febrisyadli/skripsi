<?php

$router = new \Bramus\Router\Router();
$router->setNamespace('\App\Controllers');
$router->get('/', 'Toko@index');

// ------------------------------------------------------------------------
// Admin > Auth
// ------------------------------------------------------------------------
$router->get('/admin', 'Admin@index');
$router->match('GET|POST','/admin/login', 'Admin@login');
$router->get('/admin/logout', 'Admin@logout');

// ------------------------------------------------------------------------
// Admin > Dashboard
// ------------------------------------------------------------------------
$router->get('/admin/dashboard', 'Dashboard@index');

// ------------------------------------------------------------------------
// Admin > Supplier
// ------------------------------------------------------------------------
$router->get('/admin/supplier', 'Supplier@index');
$router->match('GET|POST','/admin/supplier/tambah', 'Supplier@tambah');
$router->match('GET|POST','/admin/supplier/edit/{id}', 'Supplier@edit');
$router->get('/admin/supplier/hapus/{id}', 'Supplier@hapus');

// ------------------------------------------------------------------------
// Admin > Distributor
// ------------------------------------------------------------------------
$router->get('/admin/distributor', 'Distributor@index');
$router->match('GET|POST','/admin/distributor/tambah', 'Distributor@tambah');
$router->match('GET|POST','/admin/distributor/edit/{id}', 'Distributor@edit');
$router->get('/admin/distributor/hapus/{id}', 'Distributor@hapus');


$router->run();