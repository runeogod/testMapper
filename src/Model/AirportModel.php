<?php
namespace Src\Model;

class AirportModel { 

    private $name;
    private $lat;
    private $lng;

    public function __construct()
    {
       //TODO
    }

    public function getName() : string {
        return $this->name;
    }

    public function getLat() : float { 
        return $this->lat;
    }

    public function getLng() : float { 
        return $this->lng;
    }
}

?>