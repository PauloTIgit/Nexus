<?php

class StartCommand
{
  public function handle(): void
  {
    $port = $_SERVER['argv'][2] ?? APP_PORT;
    $publicPath = realpath(__DIR__ . '/../../');

    if (!$publicPath) {
      echo "Diretório public não encontrado.\n";
      return;
    }

    echo "Nexus server iniciado\n";
    echo "----------------------------------\n";
    echo "URL: http://localhost:{$port}\n";
    echo "Public: {$publicPath}\n";
    echo "Pressione CTRL+C para parar\n\n";

    $command = sprintf(
      'php -S localhost:%d -t %s',
      (int) $port,
      escapeshellarg($publicPath)
    );

    $process = proc_open(
      $command,
      [
        STDIN,
        STDOUT,
        STDERR
      ],
      $pipes
    );

    if (is_resource($process)) {
      proc_close($process);
    }
  }
}
