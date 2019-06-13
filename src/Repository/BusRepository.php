<?php
namespace Src\Repository;

use Src\Database\DatabaseHandler as DatabaseHandler;
use Src\Model\BusModel as Bus;
use Src\Repository\CityRepository as CityRepository;


class BusRepository extends DatabaseHandler {

    private $db = null;

    public function __construct()
    {
        $db = (new DatabaseHandler())->getConnection();
        $this->db = $db;
    }

    public function findAll()
    {
        $query = "SELECT * FROM bus";

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
                bus
            WHERE id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, Bus::class);
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
            bus
            WHERE depart_id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($depart));
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, Bus::class);
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
            bus
            WHERE depart_id = ? AND destination_id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($depart, $destination));
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, Bus::class);
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
            bus
            WHERE destination_id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($destination));
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, Bus::class);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }
}