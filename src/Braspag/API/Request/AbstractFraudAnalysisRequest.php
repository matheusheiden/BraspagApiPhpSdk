<?php


namespace Braspag\API\Request;


use Braspag\API\Client;
use Braspag\API\Environment;
use Braspag\API\Merchant;

abstract class AbstractFraudAnalysisRequest extends AbstractRequest
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var Environment
     */
    private $environment;
    /**
     * @var Merchant
     */
    private $merchant;

    public function __construct(Client $client, Environment $environment, Merchant $merchant)
    {
        $this->client = $client;
        $this->environment = $environment;
        $this->merchant = $merchant;
    }

    /**
     * @return Merchant
     */
    public function getMerchant(): Merchant
    {
        return $this->merchant;
    }

    /**
     * @return Environment
     */
    public function getEnvironment(): Environment
    {
        return $this->environment;
    }

    protected function sendAuthRequest($method, $url, $body)
    {
        return $this->_sendRequest($url, $method, [
            'Authorization: Basic '.base64_encode($this->getClient()->getId().':'. $this->getClient()->getSecret())
        ], $body, null, ['no_headers_merge']);
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    public function generateRequestId()
    {
        return substr(uniqid(),0,8).'-'.substr(uniqid(),0,4).'-'.substr(uniqid(),0,4).'-'.substr(uniqid(),0,4).'-'.substr(uniqid(),0,12);
    }
}