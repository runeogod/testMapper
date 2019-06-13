<?php
namespace Src\Model;
use Src\Model\Seat as Seat;

class FlightModel { 

    private $name; // 78A
    private $depar_id; // 1
    private $destination_id; // Perpignan
    private $start_hour; // 12:00
    private $seat; //A21

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

    public function getSeat() : Seat { 
        return $this->seat;
    }

}

?>