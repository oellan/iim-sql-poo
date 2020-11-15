<?php
namespace Core;

class Database{

    protected $pdo;
    private $host;
    private $dbname;
    private $user;
    private $pass;

    public function __construct()
    {
        try {
            require "Config/config.php";
            $this->host = $dbConfig["host"];
            $this->dbname = $dbConfig["dbname"];
            $this->user = $dbConfig["user"];
            $this->pass = $dbConfig["pass"];
            $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        } catch (\PDOException $e) {

        }
    }

    public function query($statement, $one=false)
    {
        $query = $this->pdo->query($statement);
        if($one) {
            return $query->fetch(\PDO::FETCH_OBJ);
        }
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function prepare($statement, $data=[])
    {
        $prepare = $this->pdo->prepare($statement);
        $prepare->execute($data);
        return $prepare->fetchAll();
    }
}