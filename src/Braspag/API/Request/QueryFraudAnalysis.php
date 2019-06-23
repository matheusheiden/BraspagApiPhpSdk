<?php


namespace Braspag\API\Request;


use Braspag\API\Analysis;
use Braspag\API\FraudAnalysis;

class QueryFraudAnalysis extends AbstractFraudAnalysisRequest
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

    /**
     * @param $analysisId
     * @return Analysis
     */
    public function execute($analysisId)
    {
        $url = $this->getEnvironment()->getRiskUrl() . 'analysis/v2/'.$analysisId;

        return $this->_sendRequest($url, 'GET', [
            'MerchantId: ' . $this->getMerchant()->getId(),
            'MerchantKey: ' . $this->getMerchant()->getKey(),
            'RequestId: ' . $this->generateRequestId(),
            'Authorization: Bearer '.$this->getAccessToken()
        ], null, null);
    }

    protected function unserialize($json)
    {
        return Analysis::fromJson($json);
    }
}