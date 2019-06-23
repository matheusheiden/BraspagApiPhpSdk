<?php


namespace Braspag\API;


class AnalysisResponse implements \JsonSerializable
{
    const ACCEPT_STATUS = 'Accept';

    const REJECT_STATUS = 'Reject';

    const PENDENT_STATUS = 'Pendent';

    const UNFINISHED_STATUS = 'Unfinished';

    const ERROR_STATUS = 'ProviderError';

    const REVIEW_STATUS = 'Review';
    /**
     * @var  string
     */
    public $transactionId;

    /**
     * @var status
     */
    public $status;
    public $providerAnalysisResult; //String
    public $links;

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    } //String

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getProviderAnalysisResult()
    {
        return $this->providerAnalysisResult;
    } //ProviderAnalysisResult

    public function setProviderAnalysisResult($providerAnalysisResult)
    {
        $this->providerAnalysisResult = $providerAnalysisResult;
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function setLinks($links)
    {
        $this->links = $links;
    } //array(Link)

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
     * @param \stdClass $obj]
     */
    public function populate(\stdClass $obj)
    {
        $this->setTransactionId($obj->TransactionId ?? null);
        $this->setLinks($obj->Links ?? null);
        $this->setStatus($obj->Status ?? null);
        $this->setProviderAnalysisResult($obj->ProviderAnalysisResult ?? null);
    }

    public static function fromJson($json)
    {
        $object = json_decode($json);

        $aResponse = new AnalysisResponse();
        $aResponse->populate($object);

        return $aResponse;
    }
}