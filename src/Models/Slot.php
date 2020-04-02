<?php
/*
 * GympassAPILib
 */

namespace GympassAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Slot implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @maps occur_date
     * @var string $occurDate public property
     */
    public $occurDate;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $room public property
     */
    public $room;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $status public property
     */
    public $status;

    /**
     * @todo Write general description for this property
     * @required
     * @maps length_in_minutes
     * @var integer $lengthInMinutes public property
     */
    public $lengthInMinutes;

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
     * @todo Write general description for this property
     * @required
     * @maps product_id
     * @var integer $productId public property
     */
    public $productId;

    /**
     * @todo Write general description for this property
     * @required
     * @maps booking_window
     * @var \GympassAPILib\Models\BookingWindow $bookingWindow public property
     */
    public $bookingWindow;

    /**
     * @todo Write general description for this property
     * @required
     * @var \GympassAPILib\Models\Instructor[] $instructors public property
     */
    public $instructors;

    /**
     * @todo Write general description for this property
     * @required
     * @maps cancellable_until
     * @var string $cancellableUntil public property
     */
    public $cancellableUntil;

    /**
     * @todo Write general description for this property
     * @required
     * @var double $rating public property
     */
    public $rating;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $virtual public property
     */
    public $virtual;

    /**
     * Constructor to set initial or default values of member properties
     * @param string        $occurDate        Initialization value for $this->occurDate
     * @param string        $room             Initialization value for $this->room
     * @param integer       $status           Initialization value for $this->status
     * @param integer       $lengthInMinutes  Initialization value for $this->lengthInMinutes
     * @param integer       $totalCapacity    Initialization value for $this->totalCapacity
     * @param integer       $totalBooked      Initialization value for $this->totalBooked
     * @param integer       $productId        Initialization value for $this->productId
     * @param BookingWindow $bookingWindow    Initialization value for $this->bookingWindow
     * @param array         $instructors      Initialization value for $this->instructors
     * @param string        $cancellableUntil Initialization value for $this->cancellableUntil
     * @param double        $rating           Initialization value for $this->rating
     * @param bool          $virtual          Initialization value for $this->virtual
     */
    public function __construct()
    {
        if (12 == func_num_args()) {
            $this->occurDate        = func_get_arg(0);
            $this->room             = func_get_arg(1);
            $this->status           = func_get_arg(2);
            $this->lengthInMinutes  = func_get_arg(3);
            $this->totalCapacity    = func_get_arg(4);
            $this->totalBooked      = func_get_arg(5);
            $this->productId        = func_get_arg(6);
            $this->bookingWindow    = func_get_arg(7);
            $this->instructors      = func_get_arg(8);
            $this->cancellableUntil = func_get_arg(9);
            $this->rating           = func_get_arg(10);
            $this->virtual          = func_get_arg(11);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['occur_date']        = $this->occurDate;
        $json['room']              = $this->room;
        $json['status']            = $this->status;
        $json['length_in_minutes'] = $this->lengthInMinutes;
        $json['total_capacity']    = $this->totalCapacity;
        $json['total_booked']      = $this->totalBooked;
        $json['product_id']        = $this->productId;
        $json['booking_window']    = $this->bookingWindow;
        $json['instructors']       = $this->instructors;
        $json['cancellable_until'] = $this->cancellableUntil;
        $json['rating']            = $this->rating;
        $json['virtual']           = $this->virtual;

        return $json;
    }
}
