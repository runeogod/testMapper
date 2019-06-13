<?php
namespace Src\Repository;

use Src\Database\DatabaseHandler as DatabaseHandler;
use Src\Model\TrainModel as Train;

class TrainRepository extends DatabaseHandler {

    private $db = null;

    public function __construct()
    {
        $db = (new DatabaseHandler())->getConnection();
        $this->db = $db;
    }

    public function findAll()
    {
        $query = "SELECT * FROM train";

        try {
            $query = $this->db->query($query);
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function find($id)
    {
        $statement = "
            SELECT 
                *
            FROM
            train
            WHERE id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function findDepart($depart)
    {
        $statement = "
            SELECT 
                *
            FROM
            train
            WHERE depart_id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($depart));
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, Train::class);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }


    public function findDestination($destination)
    {
        $statement = "
            SELECT 
                *
            FROM
            train
            WHERE destination_id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($destination));
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, Train::class);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function findDepartAndDestination($depart, $destination)
    {
        $statement = "
            SELECT 
                *
            FROM
            train
            WHERE depart_id = ? AND destination_id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($depart, $destination));
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, Train::class);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

}