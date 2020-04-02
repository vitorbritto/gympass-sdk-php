<?php
/*
 * GympassAPILib
 */

namespace GympassAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Instructor implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $substitute public property
     */
    public $substitute;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name       Initialization value for $this->name
     * @param bool   $substitute Initialization value for $this->substitute
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->name       = func_get_arg(0);
            $this->substitute = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['name']       = $this->name;
        $json['substitute'] = $this->substitute;

        return $json;
    }
}
