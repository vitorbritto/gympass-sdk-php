<?php
/*
 * GympassAPILib
 */

namespace GympassAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class BookingWindow implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @maps opens_at
     * @var string $opensAt public property
     */
    public $opensAt;

    /**
     * @todo Write general description for this property
     * @required
     * @maps closes_at
     * @var string $closesAt public property
     */
    public $closesAt;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $opensAt  Initialization value for $this->opensAt
     * @param string $closesAt Initialization value for $this->closesAt
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->opensAt  = func_get_arg(0);
            $this->closesAt = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['opens_at']  = $this->opensAt;
        $json['closes_at'] = $this->closesAt;

        return $json;
    }
}
