<?php
namespace Src\Model;

class CityModel { 

    private $id;
    private $name;
    private $zipcode;


    public function __construct()
    {
       //TODO
    }

    public function getId() : int {
        return $this->id;
    }

    public function getName() : string {
        return $this->name;
    }
    
    public function zipCode() : int {
        return $this->zipcode;
    }

}

?>