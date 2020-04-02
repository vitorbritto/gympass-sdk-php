<?php
/*
 * GympassAPILib
 */

namespace GympassAPILib\Controllers;

use GympassAPILib\APIException;
use GympassAPILib\APIHelper;
use GympassAPILib\Configuration;
use GympassAPILib\Models;
use GympassAPILib\Exceptions;
use GympassAPILib\Http\HttpRequest;
use GympassAPILib\Http\HttpResponse;
use GympassAPILib\Http\HttpMethod;
use GympassAPILib\Http\HttpContext;
use GympassAPILib\Servers;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class BookingsController extends BaseController
{
    /**
     * @var BookingsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return BookingsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * @todo Add general description for this endpoint
     *
     * @param string         $gymId          The identifier of the gym at Gympass. Provided by Gympass.
     * @param string         $bookingNumber  The booking identifier at Gympass. Returned when create a Boooking.
     * @param Models\Booking $payload        Payload for updating a booking.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function update(
        $gymId,
        $bookingNumber,
        $payload
    ) {

        //prepare query string for API call
        $_queryBuilder = '/booking/v1/gyms/{gym_id}/bookings/{booking_number}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'gym_id'         => $gymId,
            'booking_number' => $bookingNumber,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8',
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthAccessToken)
        );

        //json encode body
        $_bodyJson = Request\Body::Json($payload);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::PATCH, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::patch($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }
}
