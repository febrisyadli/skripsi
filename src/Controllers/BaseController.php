<?php
namespace App\Controllers;

class BaseController
{
  public function render($view, $data=[])
  {
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../Views');
    $twig = new \Twig\Environment($loader, [
      'debug' => true,
      'cache' => false
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());
    $twig->addGlobal('BASEURL', BASEURL);
    echo $twig->render($view.'.twig', $data);
  }
}