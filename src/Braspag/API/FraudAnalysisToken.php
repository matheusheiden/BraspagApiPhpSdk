<?php


namespace Braspag\API;


class FraudAnalysisToken implements \JsonSerializable
{
    /**
     * @var string
     */
    private $tokenType;

    /**
     * @var  int
     */
    private $expiresIn;
    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
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
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * @param string $tokenType
     */
    public function setTokenType(string $tokenType)
    {
        $this->tokenType = $tokenType;
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    /**
     * @param int $expiresIn
     */
    public function setExpiresIn(int $expiresIn)
    {
        $this->expiresIn = $expiresIn;
    }

    public function populate(\stdClass $data)
    {
        $this->setAccessToken($data->access_token ?? null);
        $this->setTokenType($data->token_type ?? null);
        $this->setExpiresIn($data->expires_in ?? null);
    }

    public static function fromJson($json)
    {
        $object = json_decode($json);

        $token = new FraudAnalysisToken();
        $token->populate($object);

        return $token;
    }
}