<?php
namespace App\Controllers;

class Toko extends BaseController
{
  public function index()
  {
    self::render('toko/beranda');
  }
}