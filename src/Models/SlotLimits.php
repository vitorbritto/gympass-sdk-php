<?php
/*
 * GympassAPILib
 */

namespace GympassAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class SlotLimits implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @maps total_capacity
     * @var integer $totalCapacity public property
     */
    public $totalCapacity;

    /**
     * @todo Write general description for this property
     * @required
     * @maps total_booked
     * @var integer $totalBooked public property
     */
    public $totalBooked;

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $totalCapacity Initialization value for $this->totalCapacity
     * @param integer $totalBooked   Initialization value for $this->totalBooked
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->totalCapacity = func_get_arg(0);
            $this->totalBooked   = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['total_capacity'] = $this->totalCapacity;
        $json['total_booked']   = $this->totalBooked;

        return $json;
    }
}
