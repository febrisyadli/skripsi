<?php
namespace App\Controllers;

class Dashboard extends BaseController
{

  public function __construct()
  {
    if (!hasLoginAdmin()) { redirect('/admin'); }
  }

  public function index()
  {
    self::render('admin/dashboard');
  }
}