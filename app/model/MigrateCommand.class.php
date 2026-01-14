<?php


class MigrateCommand
{
  public function handle(): void
  {
    echo "Rodando migrations...\n";

    if (migration_start()) {
      echo "Migrations executadas com sucesso.\n";
    } else {
      echo "Erro ao executar migrations.\n";
    }
  }
}
