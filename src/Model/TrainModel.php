<?php
namespace Src\Model;

class TrainModel { 

    private $name; // 78A
    private $depar_id; // 1
    private $destination_id; // Perpignan
    private $start_hour; // 12:00

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

    


}

?>