<?php

class SeedCommand
{
  public function handle(): void
  {
    echo "Rodando seeds...\n";

    $dir = realpath(__DIR__ . '/../seeds');

    if (!$dir) {
      echo "Diretório de seeds não encontrado.\n";
      return;
    }

    $migration = new \Migration();
    $migration->runMigrations($dir);

    echo "Seeds executados.\n";
  }
}