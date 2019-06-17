<?php

namespace BoardingPass;

/**
 * This is the class that constructs the PlaneBoardingPass from the input and 
 * returns the formatted string that should be displayed
 * 
 */

class PlaneBoardingPass extends Destinations
{
    protected $plane_no;

    protected $gate;

    protected $seat;

    protected $baggage;

    public function __construct($plane_no, $gate, $seat, $baggage = null, $from, $to)
    {
        parent::__construct($from, $to);

        $this->plane_no = $plane_no;
        $this->gate = $gate;
        $this->seat = $seat;
        $this->baggage = $baggage;
    }

    /**
     * Method that returns the formatted string that will
     * be displayed to the user
     * 
     * @param mixed $plane_no

     * @param mixed $gate

     * @param mixed $seat

     * @param mixed|null $baggage

     * @param mixed $from

     * @param mixed $to

     * @return void
     */
    public function formatString()
    {
        $string = $this->checkSeat();
        return sprintf($string, $this->from, $this->plane_no, $this->to, $this->gate, $this->seat, $this->baggage);
    }

    /**
     * Method that checks if a seat assignment is made
     */
    private function checkSeat()
    {
        if(empty($this->seat)) {
            if(empty($this->baggage)) {
                return '<p>From %s, take flight %s to %s. Gate %s, no seat assignment. Baggages will be automatically transferred from your last leg.</p>';
            } else {
                return '<p>From %s, take flight %s to %s. Gate %s, no seat assignment. Baggage drop at ticket counter %s.</p>';
            }
        } else {
            if(empty($this->baggage)) {
                return '<p>From %s, take flight %s to %s. Gate %s, seat %s. Baggages will be automatically transferred from your last leg.</p>';
            } else {
                return '<p>From %s, take flight %s to %s. Gate %s, seat %s. Baggage drop at ticket counter %s.</p>';
            }
        }
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