<?php
/*
 * GympassAPILib
 */

namespace GympassAPILib;

/**
 * All configuration including auth info and base URI for the API access
 * are configured in this class.
 */
class Configuration
{
    /**
     * The environment being used'
     * @var string
     */
    public static $environment = Environments::PRODUCTION;

    /**
     * OAuth 2.0 Access Token
     * @var string
     */
    public static $oAuthAccessToken = 'TODO: Replace';

    /**
     * Get the base uri for a given server in the current environment
     * @param  string $server Server name
     * @return string         Base URI
     */
    public static function getBaseUri($server = Servers::DEFAULT_)
    {
        return APIHelper::appendUrlWithTemplateParameters(
            static::$environmentsMap[static::$environment][$server],
            array(
            )
        );
    }

    /**
     * A map of all baseurls used in different environments and servers
     * @var array
     */
    private static $environmentsMap = array(
        Environments::PRODUCTION => array(
            Servers::DEFAULT_ => 'https://api.partners.gympass.com',
        ),
        Environments::SANDBOX => array(
            Servers::DEFAULT_ => 'https://api.partners.gympass-staging.com',
        ),
    );
}
