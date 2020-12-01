<?php

namespace Core;

use PDO;
use PDOException;
use RuntimeException;

class Database
{

    private PDO $pdo;

    public function __construct()
    {
        try {
            $dbConfig = include "Config/config.php";
            if ($dbConfig === false) {
                throw new RuntimeException("Please use config.php to create a valid config.php file");
            }
            $this->pdo = new PDO(
                'mysql:host=' . $dbConfig["host"] . ':' . $dbConfig["port"] . ';dbname=' . $dbConfig["dbname"] . ";charset=utf8mb4",
                $dbConfig["user"],
                $dbConfig["pass"]
            );
        } catch (PDOException $e) {

        }
    }

    public function query($statement, $one = false)
    {
        $query = $this->pdo->query($statement);
        if ($one) {
            return $query->fetch(PDO::FETCH_OBJ);
        }
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function prepare($statement, $data = [], $one = false):array
    {
        $prepare = $this->pdo->prepare($statement);
        $prepare->execute($data);

        if ($one) {
            return $prepare->fetch();
        }
        return $prepare->fetchAll();
    }
}