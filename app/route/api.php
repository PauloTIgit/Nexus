<?php
$_SESSION['ErroInterno'] = [];

rota('/api', function () {
  request_api([
    'GET' => function () {
      res([
        "code" => 200,
        "success" => true,
        "msg" => "API 2026 - version 1.0"
      ]);
    }
  ]);
});


rota('/migration_start', function () {
  request_api([
    'GET' => function () {
      $res = migration_start();
      res([
        "code" => 200,
        "success" => true,
        "msg" => "API 2026 - version 1.0",
        "data" => [
          $res
        ]
      ]);
    }
  ]);
});
