<?php
namespace Src\Database;

class DatabaseHandler {

    private $pdo = null;

    public function __construct()
    {
        $dbHost = getenv('DATABASE_HOST');
        $dbPort = getenv('DATABASE_PORT');
        $dbName = getenv('DATABASE_NAME');
        $dbUser = getenv('DATABASE_USERNAME');
        $dbPass = getenv('DATABASE_PASSWORD');

        try {
            $this->pdo = new \PDO(
                "mysql:host=$dbHost;port=$dbPort;charset=utf8mb4;dbname=$dbName",
                $dbUser,
                $dbPass
            );
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            die();
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

}