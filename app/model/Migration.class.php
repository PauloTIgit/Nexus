<?php

class Migration extends Ligacao
{
  /**
   * Tenta conectar normalmente
   */
  public function Migration(): ?PDO
  {
    return $this->conecta();
  }

  /**
   * Executa todos os arquivos .sql do diretório
   */
  public function runMigrations($path = __DIR__ . "/../migration/"): bool
  {
    $pdo = $this->forceConnection();

    if (!$pdo) {
      return false;
    }

    $files = glob($path . '/*.sql');

    if (!$files) {
      return false;
    }

    sort($files); // garante ordem correta

    foreach ($files as $file) {
      $sql = file_get_contents($file);

      if (!$sql) {
        continue;
      }

      $pdo->exec($sql);
    }

    return true;
  }

  /**
   * Conexão forçada (cria o banco se não existir)
   */
  private function forceConnection(): ?PDO
  {
    try {
      $pdo = new PDO(
        "mysql:host=" . DB_HOST,
        DB_USERNAME,
        DB_PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
      );

      // cria o banco se não existir
      $pdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_DATABASE . "`");
      $pdo->exec("USE `" . DB_DATABASE . "`");
      $pdo->exec("SET NAMES utf8");

      return $pdo;
    } catch (Throwable $e) {
      return null;
    }
  }

  /**
   * Dropar banco de dados
   */
  public function dropDatabase(): void
  {
    $pdo = $this->forceConnection(false);
    $pdo->exec("DROP DATABASE IF EXISTS `" . DB_DATABASE . "`");
  }
}
