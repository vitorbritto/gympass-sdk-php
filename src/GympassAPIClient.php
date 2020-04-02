<?php
/*
 * GympassAPILib
 */

namespace GympassAPILib;

use GympassAPILib\Controllers;

/**
 * GympassAPILib client class
 */
class GympassAPIClient
{
    /**
     * Constructor with authentication and configuration parameters
     */
    public function __construct(
        $oAuthAccessToken = null
    ) {
        Configuration::$oAuthAccessToken = $oAuthAccessToken ? $oAuthAccessToken : Configuration::$oAuthAccessToken;
    }
    /**
     * Singleton access to Classes controller
     * @return Controllers\ClassesController The *Singleton* instance
     */
    public function getClasses()
    {
        return Controllers\ClassesController::getInstance();
    }
    /**
     * Singleton access to Slots controller
     * @return Controllers\SlotsController The *Singleton* instance
     */
    public function getSlots()
    {
        return Controllers\SlotsController::getInstance();
    }
    /**
     * Singleton access to Bookings controller
     * @return Controllers\BookingsController The *Singleton* instance
     */
    public function getBookings()
    {
        return Controllers\BookingsController::getInstance();
    }
}
