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
class SlotsController extends BaseController
{
    /**
     * @var SlotsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return SlotsController The *Singleton* instance.
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
     * @param string      $gymId    The identifier of the gym at Gympass. Provided by Gympass.
     * @param string      $classId  The identifier of the class at Gympass. Returned when create a Class.
     * @param Models\Slot $payload  Payload for creating a class
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function create(
        $gymId,
        $classId,
        $payload
    ) {

        //prepare query string for API call
        $_queryBuilder = '/booking/v1/gyms/{gym_id}/classes/{class_id}/slots';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'gym_id'   => $gymId,
            'class_id' => $classId,
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
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

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

    /**
     * @todo Add general description for this endpoint
     *
     * @param string $gymId    The identifier of the gym at Gympass. Provided by Gympass.
     * @param string $classId  The identifier of the class at Gympass. Returned when create a Class.
     * @param string $slotId   The identifier of the Slot at Gympass. Returned when create a Slot.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getView(
        $gymId,
        $classId,
        $slotId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/booking/gyms/{gym_id}/classes/{class_id}/slots/{slot_id}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'gym_id'   => $gymId,
            'class_id' => $classId,
            'slot_id'  => $slotId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthAccessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

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

    /**
     * @todo Add general description for this endpoint
     *
     * @param string $gymId    The identifier of the gym at Gympass. Provided by Gympass.
     * @param string $classId  The identifier of the class at Gympass. Returned when create a Class.
     * @param string $from     timezoned date/time to start find slots. It should be entered based on the location of
     *                         the gym.
     * @param string $to       timezoned date/time to start find slots. It should be entered based on the location of
     *                         the gym.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function mlist(
        $gymId,
        $classId,
        $from,
        $to
    ) {

        //prepare query string for API call
        $_queryBuilder = '/booking/v1/gyms/{gym_id}/classes/{class_id}/slots';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'gym_id'   => $gymId,
            'class_id' => $classId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'From'     => $from,
            'To'       => $to,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthAccessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

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

    /**
     * @todo Add general description for this endpoint
     *
     * @param string $gymId    The identifier of the gym at Gympass. Provided by Gympass.
     * @param string $classId  The identifier of the class at Gympass. Returned when create a Class.
     * @param string $slotId   The identifier of the Slot at Gympass. Returned when create a Slot.
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function delete(
        $gymId,
        $classId,
        $slotId
    ) {

        //prepare query string for API call
        $_queryBuilder = 
            '/booking/v1/gyms/{gym_id}/classes/{class_id}/slots/:{slot_id}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'gym_id'   => $gymId,
            'class_id' => $classId,
            'slot_id'  => $slotId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthAccessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::delete($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
    }

    /**
     * @todo Add general description for this endpoint
     *
     * @param string            $gymId    The identifier of the gym at Gympass. Provided by Gympass.
     * @param string            $classId  The identifier of the class at Gympass. Returned when create a Class.
     * @param string            $slotId   The identifier of the Slot at Gympass. Returned when create a Slot.
     * @param Models\SlotLimits $payload  Payload for updating slot limits.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createPatch(
        $gymId,
        $classId,
        $slotId,
        $payload
    ) {

        //prepare query string for API call
        $_queryBuilder = 
            '/booking/v1/gyms/{gym_id}/classes/{class_id}/slots/{slot_id}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'gym_id'   => $gymId,
            'class_id' => $classId,
            'slot_id'  => $slotId,
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
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

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

    /**
     * @todo Add general description for this endpoint
     *
     * @param Models\Slot $payload Payload for creating a slot.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function update(
        $payload
    ) {

        //prepare query string for API call
        $_queryBuilder = '/booking/v1/gyms/1/classes/1/slots/1';

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
        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::put($_queryUrl, $_headers, $_bodyJson);

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
