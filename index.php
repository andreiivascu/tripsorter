<?php
/**
  * This is the main view that runs the trip sorting of boarding cards.
  * 
  */
require_once 'BoardingPass/Destinations.php';
require_once 'BoardingPass/PlaneBoardingPass.php';
require_once 'BoardingPass/TrainBoardingPass.php';
require_once 'BoardingPass/BusBoardingPass.php';
require_once 'Trip/Trip.php';

use BoardingPass\PlaneBoardingPass;
use BoardingPass\TrainBoardingPass;
use BoardingPass\BusBoardingPass;
use Trip\Trip;

$cards = [
          new PlaneBoardingPass('SK455', '45B', '3A', '344', 'Gerona Airport', 'Stockholm'),
          new TrainBoardingPass('78A', '6', '45B', 'Madrid', 'Barcelona'),
          new PlaneBoardingPass('SK22', '22', '7B', '', 'Stockholm', 'New York JFK'),
          new BusBoardingPass('366', '4', 'Barcelona', 'Gerona Airport'),
          // new PlaneBoardingPass('DL756', '10', '23C', '', 'New York LaGuardia', 'Miami'),
          // new TrainBoardingPass('89H', '17', '25C', 'New York JFK', 'New York Central Station'),
          // new BusBoardingPass('105', '12', 'New York Central Station', 'New York LaGuardia')
        ];
$trip = new Trip($cards);

echo $trip->sortCards();
