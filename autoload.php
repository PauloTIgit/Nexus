<?php
date_default_timezone_set('America/Sao_Paulo');


$autoload = spl_autoload_register(
  function ($class) {
    require __DIR__ . "/app/model/$class.class.php";
  }
);

require __DIR__ . "/vendor/autoload.php";
