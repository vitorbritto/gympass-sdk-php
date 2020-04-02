<?php
/*
 * GympassAPILib
 */

namespace GympassAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Booking implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @maps class_id
     * @var integer $classId public property
     */
    public $classId;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $status public property
     */
    public $status;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $reason public property
     */
    public $reason;

    /**
     * @todo Write general description for this property
     * @required
     * @maps virtual_class_url
     * @var string $virtualClassUrl public property
     */
    public $virtualClassUrl;

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $classId         Initialization value for $this->classId
     * @param integer $status          Initialization value for $this->status
     * @param string  $reason          Initialization value for $this->reason
     * @param string  $virtualClassUrl Initialization value for $this->virtualClassUrl
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->classId         = func_get_arg(0);
            $this->status          = func_get_arg(1);
            $this->reason          = func_get_arg(2);
            $this->virtualClassUrl = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['class_id']          = $this->classId;
        $json['status']            = $this->status;
        $json['reason']            = $this->reason;
        $json['virtual_class_url'] = $this->virtualClassUrl;

        return $json;
    }
}
