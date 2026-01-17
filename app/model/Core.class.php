<?php

class Core
{
  public function __construct()
  {
    include __DIR__ . "/../../resource/env.php";
    include __DIR__ . '/../controller/Core.Controller.php';
    include __DIR__ . '/../route/web.php';
    include __DIR__ . '/../route/api.php';

    $rota = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/'));

    if (!isset($_SESSION['dadosRoute'])) {
      rouback("404");
      die();
    }

    for ($i = 0; $i < count($_SESSION['dadosRoute']); $i++) {
      $resultado = ($rota == $_SESSION['dadosRoute'][$i]) ? 1 : 0;
    }

    $resultado == 0 && rouback("404");
  }
}
