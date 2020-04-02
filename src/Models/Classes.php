<?php
/*
 * GympassAPILib
 */

namespace GympassAPILib\Models;

use JsonSerializable;

/**
 *Creates a list of classes on a given gym
 */
class Classes extends MClass implements JsonSerializable
{
    /**
     * List of classes
     * @required
     * @var \GympassAPILib\Models\MClass[] $classes public property
     */
    public $classes;

    /**
     * Constructor to set initial or default values of member properties
     * @param array $classes Initialization value for $this->classes
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->classes = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['classes'] = $this->classes;
        $json = array_merge($json, parent::jsonSerialize());

        return $json;
    }
}
