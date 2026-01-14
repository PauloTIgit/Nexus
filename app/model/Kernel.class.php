<?php

class Kernel
{
  protected array $commands = [
    'start'          => StartCommand::class,
    'migrate'        => MigrateCommand::class,
    'db:seed'        => SeedCommand::class,
    'migrate:fresh'  => MigrateFreshCommand::class,
  ];

  public function handle(array $argv): void
  {
    $command = $argv[1] ?? 'help';

    if (!isset($this->commands[$command])) {
      $this->help();
      return;
    }

    $class = $this->commands[$command];
    (new $class())->handle();
  }

  protected function help(): void
  {
    echo PHP_EOL;
    echo "Nexus CLI\n";
    echo "----------------------------------\n";
    echo "Comandos disponíveis:\n";
    foreach ($this->commands as $name => $class) {
      echo "  php nexus {$name}\n";
    }
    echo PHP_EOL;
  }
}
