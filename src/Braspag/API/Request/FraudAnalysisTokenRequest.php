<?php


namespace Braspag\API\Request;


use Braspag\API\FraudAnalysisToken;

class FraudAnalysisTokenRequest extends AbstractFraudAnalysisRequest
{

    public function execute($param)
    {
        $url = $this->getEnvironment()->getAuthUrl() . 'oauth2/token';

        return $this->sendAuthRequest('POST', $url, $param);
    }

    protected function unserialize($json)
    {
        return FraudAnalysisToken::fromJson($json);
    }
}