<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('BASEURL','http://localhost/skripsi');

session_name('FEBRI_SESS');
session_start();

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/Bootstrap.php';
require __DIR__ . '/src/Routes.php';