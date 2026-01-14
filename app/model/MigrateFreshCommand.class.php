<?php

class MigrateFreshCommand
{
  public function handle(): void
  {
    echo "Resetando banco...\n";

    $migration = new \Migration();
    $migration->dropDatabase();
    migration_start();

    echo "Banco recriado com sucesso.\n";
  }
}
