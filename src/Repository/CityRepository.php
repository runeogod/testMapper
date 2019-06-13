<?php
namespace Src\Repository;

use Src\Database\DatabaseHandler as DatabaseHandler;
use Src\Model\CityModel as City;

class CityRepository extends DatabaseHandler {

    private $db = null;

    public function __construct()
    {
        $db = (new DatabaseHandler())->getConnection();
        $this->db = $db;
    }

    public function findAll()
    {
        $query = "SELECT * FROM city";

        try {
            $query = $this->db->query($query);
            $result = $query->fetchAll(\PDO::FETCH_CLASS, City::class);
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
            city
            WHERE id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, City::class);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function findByName($name)
    {
        $query = "SELECT * FROM city where LOWER(`name`) = ?";

        try {
            $statement = $this->db->prepare($query);
            $statement->execute(array($name));
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, City::class);
            return $result[0];

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }


}