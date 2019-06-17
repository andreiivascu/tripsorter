<?php

namespace BoardingPass;

/**
 * This is the class that constructs the BusBoardingPass from the input and 
 * returns the formatted string that should be displayed
 */

class BusBoardingPass extends Destinations
{
    protected $bus_no;

    protected $seat;

    public function __construct($bus_no, $seat, $from, $to)
    {
        parent::__construct($from, $to);

        $this->bus_no = $bus_no;
        $this->seat = $seat;
    }

    /**
     * Method that returns the formatted string that will
     * be displayed to the user
     * 
     * @param mixed $bus_no

     * @param mixed $seat

     * @param mixed $from

     * @param mixed $to

     * @return void
     */
    public function formatString()
    {
        if(empty($this->seat)) {
            $string = '<p>Take bus %d from %s to %s. No seat assignment.</p>';
        } else {
            $string = '<p>Take bus %d from %s to %s. Sit in seat %s.</p>';
        }
        return sprintf($string, $this->bus_no, $this->from, $this->to, $this->seat);
    }

    /**
     * Method that returns the from place
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Method that returns the to place
     */
    public function getTo()
    {
        return $this->to;
    }
}