<?php
namespace Braspag\API;

class Environment
{
    private $api;

    private $apiQuery;

    private $auth;

    private $risk;

    private function __construct($api, $apiQuery, $auth, $risk)
    {
        $this->api = $api;
        $this->apiQuery = $apiQuery;
        $this->auth = $auth;
        $this->risk = $risk;
    }

    public static function sandbox()
    {
        $api = 'https://apisandbox.braspag.com.br/';
        $apiQuery = 'https://apiquerysandbox.braspag.com.br/';
        $auth = 'https://authsandbox.braspag.com.br/';
        $risk = 'https://risksandbox.braspag.com.br/';
        return new Environment($api, $apiQuery, $auth, $risk);
    }

    public static function homolog()
    {
        $api = 'https://apihomolog.braspag.com.br/';
        $apiQuery = 'https://apihomolog.braspag.com.br/';
        $auth = 'https://authsandbox.braspag.com.br/';
        $risk = 'https://risksandbox.braspag.com.br/';
        return new Environment($api, $apiQuery, $auth, $risk);
    }

    public static function production()
    {
        $api = 'https://api.braspag.com.br/';
        $apiQuery = 'https://apiquery.braspag.com.br/';
        $auth = 'https://auth.braspag.com.br/';
        $risk = 'https://risk.braspag.com.br/';
        return new Environment($api, $apiQuery, $auth, $risk);
    }

    /**
     * Gets the environment's Api URL
     *
     * @return the Api URL
     */
    public function getApiUrl()
    {
        return $this->api;
    }

    /**
     * @return mixed
     */
    public function getAuthUrl()
    {
        return $this->auth;
    }

    /**
     * @return mixed
     */
    public function getRiskUrl()
    {
        return $this->risk;
    }

    /**
     * Gets the environment's Api Query URL
     *
     * @return the Api Query URL
     */
    public function getApiQueryURL()
    {
        return $this->apiQuery;
    }
}
