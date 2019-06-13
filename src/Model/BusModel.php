<?php
namespace Src\Model;

class BusModel { 

    private $name;
    private $depart_id;
    private $destination_id;
    private $start_hour;
    private $airport_id;


    public function __construct()
    {
       //TODO
    }

    public function getName() : string {
        return $this->name;
    }

    public function getDepart() : int { 
        return $this->depart_id;
    }

    public function getDestination() : int { 
        return $this->destination_id;
    }

    public function getStartHour() : string { 
        return $this->start_hour;
    }

    //One To Many so id is defined here and not in AirportModel, since there is one airport and several bus and not the opposite
    
    public function getAirportId() : int {
        return $this->airport_id;
    }

}

?>