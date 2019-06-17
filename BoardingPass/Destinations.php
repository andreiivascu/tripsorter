<?php

namespace BoardingPass;

/**
 * This is the class that constructs the Destinations which will be used
 * for each of the Boarding Passes 
 * 
 * @param mixed $from

 * @param mixed $to

 * @return void
 */

class Destinations
{
    protected $from;

    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
}