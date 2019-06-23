<?php


namespace Braspag\API\Request;


use Braspag\API\AnalysisResponse;

class FraudAnalysisRequest extends AbstractFraudAnalysisRequest
{
    /**
     * @var string
     */
    private $accessToken;

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function execute($analysisData)
    {
        $url = $this->getEnvironment()->getRiskUrl() . 'analysis/v2';

        return $this->_sendRequest($url, 'POST', [
            'MerchantId: ' . $this->getMerchant()->getId(),
            'MerchantKey: ' . $this->getMerchant()->getKey(),
            'RequestId: ' . substr(uniqid(),0,8).'-'.substr(uniqid(),0,4).'-'.substr(uniqid(),0,4).'-'.substr(uniqid(),0,4).'-'.substr(uniqid(),0,12),
            'Authorization: Bearer '.$this->getAccessToken()
        ], $analysisData, null, [ 'body_is_json']);
    }

    protected function unserialize($json)
    {
        return AnalysisResponse::fromJson($json);
    }
}