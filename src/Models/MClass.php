<?php
/*
 * GympassAPILib
 */

namespace GympassAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class MClass implements JsonSerializable
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
     * @var string $description public property
     */
    public $description;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $notes public property
     */
    public $notes;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $bookable public property
     */
    public $bookable;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $visible public property
     */
    public $visible;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $reference public property
     */
    public $reference;

    /**
     * @todo Write general description for this property
     * @required
     * @maps product_id
     * @var integer $productId public property
     */
    public $productId;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $name        Initialization value for $this->name
     * @param string  $description Initialization value for $this->description
     * @param string  $notes       Initialization value for $this->notes
     * @param bool    $bookable    Initialization value for $this->bookable
     * @param bool    $visible     Initialization value for $this->visible
     * @param string  $reference   Initialization value for $this->reference
     * @param integer $productId   Initialization value for $this->productId
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->name        = func_get_arg(0);
            $this->description = func_get_arg(1);
            $this->notes       = func_get_arg(2);
            $this->bookable    = func_get_arg(3);
            $this->visible     = func_get_arg(4);
            $this->reference   = func_get_arg(5);
            $this->productId   = func_get_arg(6);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['name']        = $this->name;
        $json['description'] = $this->description;
        $json['notes']       = $this->notes;
        $json['bookable']    = $this->bookable;
        $json['visible']     = $this->visible;
        $json['reference']   = $this->reference;
        $json['product_id']  = $this->productId;

        return $json;
    }
}
