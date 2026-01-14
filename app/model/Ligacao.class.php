<?php

abstract class Ligacao
{
  private string $host = DB_HOST;
  private string $database = DB_DATABASE;
  private string $user = DB_USERNAME;
  private string $pass = DB_PASSWORD;

  protected function conecta(): ?PDO
  {
    try {
      // Conecta apenas ao servidor (sem definir database)
      $pdo = new PDO("mysql:host={$this->host}", $this->user, $this->pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);

      // Verifica se o banco existe
      $stmt = $pdo->prepare("SHOW DATABASES LIKE :db");
      $stmt->bindValue(':db', $this->database);
      $stmt->execute();

      if ($stmt->rowCount() === 0) {
        // Banco não existe → não faz nada
        return null;
      }

      // Conecta ao banco existente
      $conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);

      $conn->exec("SET NAMES utf8");

      return $conn;
    } catch (Throwable $e) {
      return null;
    }
  }
}
