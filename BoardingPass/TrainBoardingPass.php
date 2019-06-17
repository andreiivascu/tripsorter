<?php

namespace BoardingPass;

/**
 * This is the class that constructs the TrainBoardingPass from the input and 
 * returns the formatted string that should be displayed
 * 
 * @param mixed $train_no

 * @param mixed $platform

 * @param mixed $seat

 * @param mixed $from

 * @param mixed $to

 * @return void
 */

class TrainBoardingPass extends Destinations
{
    protected $train_no;

    protected $platform;

    protected $seat;

    public function __construct($train_no, $platform, $seat, $from, $to)
    {
        parent::__construct($from, $to);

        $this->train_no = $train_no;
        $this->platform = $platform;
        $this->seat = $seat;
    }

    /**
     * Method that returns the formatted string that will
     * be displayed to the user
     * 
     * @param mixed $train_no

     * @param mixed $platform

     * @param mixed $from

     * @param mixed $to

     * @return void
     */
    public function formatString()
    {
        if(empty($this->seat)) {
            $string = '<p>Take train %d from platform %d, leaving from %s to %s. No seat assignment.</p>';
        } else {
            $string = '<p>Take train %d from platform %d, leaving from %s to %s. Sit in seat %s.</p>';
        }
        return sprintf($string, $this->train_no, $this->platform, $this->from, $this->to, $this->seat);
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