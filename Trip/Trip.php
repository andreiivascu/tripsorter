<?php
namespace Trip;

/**
 * This is the Trip class which reads the Boarding Passes 
 * and sorts them
 *  
 */

class Trip
{
    protected $cards;

    protected $destinations;

    public function __construct($cards, $destinations = array())
    {
        $this->cards = $cards;
        $this->destinations = $destinations;
    }

    /**
     * The method that reads the cards and prepares to sort them 
     */

    public function sortCards()
    {
        $trips = array();
        $this->destinations();
        $trips = $this->tripSorter($trips);
       
        if(!(count($trips) === count($this->cards))) {
            $trips = $this->tripSorter($trips);
        }

        if(count($trips) === count($this->cards)) {
            foreach($trips as $trip) {
                foreach($this->cards as $card) {
                    if($trip === $card->getFrom()) {
                        echo $card->formatString();
                    }
                }
            }

            echo '<p>You have arrived at your final destination.</p>';
        }
    }

    /**
     * The method that sorts the trips
     */
    public function tripSorter($trips)
    {
        for($i = 0; $i <= count($this->cards) - 1; $i++) {
            if(!count($trips)) {
                if(!in_array($this->cards[$i]->getFrom(), $this->destinations)) {
                    array_unshift($trips, $this->cards[$i]->getFrom());
                    $this->unsetDestinations($this->cards[$i]->getTo());
                }
            }

            if(count($trips)) {
                if(!in_array($this->cards[$i]->getFrom(), $trips)) {
                    if(!in_array($this->cards[$i]->getFrom(), $this->destinations)) {
                        array_push($trips, $this->cards[$i]->getFrom());
                        $this->unsetDestinations($this->cards[$i]->getTo());
                    }
                }
            }
        }

        return $trips;
    }

    /**
     * Method that reads the destinations
     */
    public function destinations()
    {
        for($i = 0; $i <= count($this->cards) - 1; $i++) {
            array_push($this->destinations, $this->cards[$i]->getTo());
        }

        return $this->destinations;
    }

    /**
     * Method that removes the used destinations
     * 
     * @param string $card uses the card destination as input.
     */
    public function unsetDestinations($card) {
        if (($key = array_search($card, $this->destinations)) !== false) {
            unset($this->destinations[$key]);
        }

        return $this->destinations;
    }
}