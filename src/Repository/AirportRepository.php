<?php
namespace Src\Repository;

use Src\Database\DatabaseHandler as DatabaseHandler;
use Src\Model\AirportModel as AirportModel;

class AirportRepository extends DatabaseHandler {

    private $db = null;

    public function __construct()
    {
        $db = (new DatabaseHandler())->getConnection();
        $this->db = $db;
    }

    public function findAll()
    {
        $query = "SELECT * FROM airport";

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
                airport
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

}