<?php
namespace Src\Controller;

use Src\Repository\AirportRepository as AirportRepository;
use Src\Repository\BusRepository as BusRepository;
use Src\Repository\TrainRepository as TrainRepository;
use Src\Repository\FlightRepository as FlightRepository;
use Src\Repository\CityRepository as CityRepository;
use Src\Database\DatabaseHandler as DatabaseHandler;


class DestinationController  {

    private $_classRepositoryRepository;
    private $_outputDestination;
    private $_repoTranslate;

    private $depart;
    private $destination;

    const RepositoryTransport = [TrainRepository::class, BusRepository::class, FlightRepository::class]; //All available transports

    public function __construct()
    {
        $this->_outputDestination = [];   
        $this->_repoTranslate = json_decode(file_get_contents(__DIR__ . '/../../translate.json')); //Load common word instead of repo name
    }

    /**
     * 
     * Recusrive function used to build all the route
     * $array: Array, $arraySignature: String, $destination: Integer|null
     */

    private function goThroughArray($array, $arraySignature, $destination = null) {

        $lastElement = end($array); //define last element of the array to be able to play with the position
    
        foreach($array as $a) {

            $this->_classRepository = (new $a()); //set variable as the current repo so its easier to understand
            if( $this->_classRepository->findDepartAndDestination( $this->depart->getId() , $this->destination->getId() ) ) { //If we find depart and destination on the one shot, then only one transport is requierd
                $this->_outputDestination[get_class($this->_classRepository)] = ['depart'=> $this->depart->getId() , 'destination' => $this->destination->getId() ];
            } else {
                if($currentRepo = $this->_classRepository->findDepart( (!$destination ? $this->depart->getId() : $destination))) { //If we find the depart then we will loop looking for the current destination result as depart result for the next transport
                    $this->_outputDestination[get_class($this->_classRepository)] = ['depart'=> $currentRepo[0]->getDepart(), 'destination' => $currentRepo[0]->getDestination()];
                    if($this->_classRepository->findDestination( $currentRepo[0]->getDestination() )) { 
                       if($this->destination->getId() == $currentRepo[0]->getDestination()) { //if the destination searched by the user is equel to the destination found in the transport then its found
                            $this->_outputDestination[get_class($this->_classRepository)] = ['depart'=> $currentRepo[0]->getDepart(), 'destination' => $currentRepo[0]->getDestination()];
                            return $this->_outputDestination; //so we return the array with all the transport depart and destination
                        }
                    $this->goThroughArray($array, $arraySignature, $currentRepo[0]->getDestination()); //If destination still not found we loop again
                    }
                }
            }
            if($a == $lastElement && md5(serialize($array)) == $arraySignature) { //if we didnt find anything, then we reverse array to find more possibilities
             $array = array_reverse($array);
             $this->goThroughArray($array, $arraySignature);
            }
        }

    }

    /**
     * 
     * Build final sentence for the user to understand is road to his destination
     * 
     */
    private function buildOutPutSentence() : string {
        $roadMap = null;
        foreach($this->_outputDestination as $key => $d) {
            $dD = ' from ' . (new CityRepository())->find($d['depart'])[0]->getName() . ' to ' . (new CityRepository())->find($d['destination'])[0]->getName();
            if(!$roadMap) { 
            $roadMap = 'Take the ' . $this->_repoTranslate->{$key} . $dD;
            } else {
                $roadMap .= "\n  Take the ". $this->_repoTranslate->{$key} . $dD;
            }
        }
        $roadMap .= "\n You have arrived at your final destination :)";

        return $roadMap;
    }


    /**
     * 
     * Main function for the route to be calculated, 
     * $depart: String, $destination: String
     */

    public function calculateRoute($depart, $destination) : array {

        $this->depart = (new CityRepository())->findByName($depart); //find the id of the depart (based on string since we dont have a search fonction to provide id)
        $this->destination = (new CityRepository())->findByName($destination); //same
        $arr = self::RepositoryTransport; //get all available transport

        $arraySignature = md5(serialize($arr)); //Initialise default position, since md5 provide unique hash, the serialized array become unique, simplier to 
        //check the default array position


        if($this->depart->getId() && $this->destination->getId()) { //If system understand depart and destination, then the search begin
           $this->goThroughArray($arr, $arraySignature);
        }
        if($this->_outputDestination) {
            echo $this->buildOutPutSentence();die();
            die(json_encode($this->_outputDestination));
        }

         die('No route found');
    }
}

?>