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
class ClassesController extends BaseController
{
    /**
     * @var ClassesController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return ClassesController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Creates a list of classes on a given gym.
     *
     * @param string         $gymId   The identifier of the gym at Gympass. Provided by Gympass.
     * @param Models\Classes $payload Payload for creating classes.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function create(
        $gymId,
        $payload
    ) {

        //prepare query string for API call
        $_queryBuilder = '/booking/v1/gyms/{gym_id}/classes';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'gym_id'  => $gymId,
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
     * Get a list of classes on a given gym.
     *
     * @param string $gymId  The identifier of the gym at Gympass. Provided by Gympass.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function mlist(
        $gymId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/booking/v1/gyms/{gym_id}/classes';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'gym_id' => $gymId,
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
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getView(
        $gymId,
        $classId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/booking/v1/gyms/{gym_id}/classes/{class_id}';

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
     * @param string        $gymId    The identifier of the gym at Gympass. Provided by Gympass.
     * @param string        $classId  The identifier of the class at Gympass. Returned when create a Class.
     * @param Models\MClass $payload  Payload for updating a class.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function update(
        $gymId,
        $classId,
        $payload
    ) {

        //prepare query string for API call
        $_queryBuilder = '/booking/v1/gyms/{gym_id}/classes/{class_id}';

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
