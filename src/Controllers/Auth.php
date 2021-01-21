<?php
namespace App\Controllers;

class Auth extends BaseController
{
  public function index()
  {
    //
  }

  public function login()
  {
    //
  }

  public function logout()
  {
    session_destroy();
    redirect('/');
  }

  public function register()
  {
    # code...
  }
}