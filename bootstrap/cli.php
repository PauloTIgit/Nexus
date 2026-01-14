<?php

define('CLI', true);

require __DIR__ . '/../resource/env.php';
require __DIR__ . '/../autoload.php';
include __DIR__ . '/../app/controller/Core.Controller.php';

$kernel = new Kernel();
$kernel->handle($argv);
