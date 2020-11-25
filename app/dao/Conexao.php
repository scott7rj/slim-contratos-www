<?php
namespace app\dao;

use Exception;
use PDOException;

abstract class Conexao {
    protected $pdo;
    public function __construct() {
        try {
            $host = getenv('DB_HOST');
            $database = getenv('DB_DATABASE');
            $user = getenv('DB_USER');
            $password = getenv('DB_PASSWORD');
            $dsn = "sqlsrv:Server={$host};Database={$database}";
            $this->pdo = new \PDO($dsn, $user, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}