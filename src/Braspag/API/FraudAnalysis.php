<?php


namespace Braspag\API;


class FraudAnalysis implements BraspagSerializable
{
    const ANALYSE_FIRST_SEQUENCE = 'AnalyseFirst';

    const AUTHORIZE_FIRST_SEQUENCE = 'AuthorizeFirst';

    const CRITERIA_ALWAYS = 'Always';

    const CRITERIA_ON_SUCCESS = 'OnSuccess';

    const PROVIDER_CYBERSOURCE = 'Cybersource';

    private $sequence;

    private $sequenceCriteria;

    private $provider;

    private $captureOnLowRisk;

    private $voidOnHighRisk;

    private $totalOrderAmount;

    private $fingerPrintId;

    private $browser;

    private $cart;

    private $merchantDefinedFields;

    private $id;

    private $status;

    private $fraudAnalysisReasonCode;

    private $replyData;

    private $transactionId;

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param mixed $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return mixed
     */
    public function getProviderAnalysisResult()
    {
        return $this->providerAnalysisResult;
    }

    /**
     * @param mixed $providerAnalysisResult
     */
    public function setProviderAnalysisResult($providerAnalysisResult)
    {
        $this->providerAnalysisResult = $providerAnalysisResult;
    }

    /**
     * @return mixed
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param mixed $links
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * @return mixed
     */
    public function getBraspagTransactionId()
    {
        return $this->braspagTransactionId;
    }

    /**
     * @param mixed $braspagTransactionId
     */
    public function setBraspagTransactionId($braspagTransactionId)
    {
        $this->braspagTransactionId = $braspagTransactionId;
    }

    private $providerAnalysisResult;

    private $links;

    private $braspagTransactionId;

    public function populate(\stdClass $data)
    {
        $this->id = $data->Id ?? null;
        $this->status = $data->Status ?? null;
        $this->fraudAnalysisReasonCode = $data->FraudAnalysisReasonCode ?? null;
        $this->replyData = $data->ReplyData ?? null;
        $this->sequence = isset($data->Sequence)? $data->Sequence: null;
        $this->sequenceCriteria = isset($data->SequenceCriteria)? $data->SequenceCriteria: null;
        $this->provider = isset($data->Provider)? $data->Provider: null;
        $this->captureOnLowRisk = isset($data->CaptureOnLowRisk) ?  $data->CaptureOnLowRisk: false;
        $this->voidOnHighRisk = isset($data->VoidOnHighRisk) ? $data->VoidOnHighRisk: false;
        $this->totalOrderAmount = isset($data->TotalOrderAmount) ? $data->TotalOrderAmount: false;
        $this->fingerPrintId = isset($data->FingerPrintId) ?  $data->FingerPrintId: false;
        $this->browser = isset($data->Browser) ?  $data->Browser: false;
        $this->cart = isset($data->Cart) ? $data->Cart: false;
        $this->merchantDefinedFields = isset($data->MerchantDefinedFields) ? $data->MerchantDefinedFields :  false;
        $this->transactionId = $data->TransactionId ?? null;
        $this->providerAnalysisResult = $data->ProviderAnalysisResult ?? null;
        $this->links = $data->Links ?? null;
        $this->braspagTransactionId = $data->BraspagTransactionId ?? null;
    }

    public static function fromJson($json)
    {
        $object = json_decode($json);

        $fraud = new FraudAnalysis();

        $fraud->populate($object);

        return $fraud;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getFraudAnalysisReasonCode()
    {
        return $this->fraudAnalysisReasonCode;
    }

    /**
     * @param mixed $fraudAnalysisReasonCode
     */
    public function setFraudAnalysisReasonCode($fraudAnalysisReasonCode)
    {
        $this->fraudAnalysisReasonCode = $fraudAnalysisReasonCode;
    }

    /**
     * @return mixed
     */
    public function getReplyData()
    {
        return $this->replyData;
    }

    /**
     * @param mixed $replyData
     */
    public function setReplyData($replyData)
    {
        $this->replyData = $replyData;
    }

    /**
     * @return mixed
     */
    public function getMerchantDefinedFields()
    {
        return $this->merchantDefinedFields;
    }

    /**
     * @param mixed $merchantDefinedFields
     */
    public function setMerchantDefinedFields($merchantDefinedFields)
    {
        $this->merchantDefinedFields = $merchantDefinedFields;
    }
    /**
     * @return mixed
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param mixed $sequence
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getSequenceCriteria()
    {
        return $this->sequenceCriteria;
    }

    /**
     * @param mixed $sequenceCriteria
     */
    public function setSequenceCriteria($sequenceCriteria)
    {
        $this->sequenceCriteria = $sequenceCriteria;
    }

    /**
     * @return mixed
     */
    public function getCaptureOnLowRisk()
    {
        return $this->captureOnLowRisk;
    }

    /**
     * @param mixed $captureOnLowRisk
     */
    public function setCaptureOnLowRisk($captureOnLowRisk)
    {
        $this->captureOnLowRisk = $captureOnLowRisk;
    }

    /**
     * @return mixed
     */
    public function getVoidOnHighRisk()
    {
        return $this->voidOnHighRisk;
    }

    /**
     * @param mixed $voidOnHighRisk
     */
    public function setVoidOnHighRisk($voidOnHighRisk)
    {
        $this->voidOnHighRisk = $voidOnHighRisk;
    }

    /**
     * @return mixed
     */
    public function getTotalOrderAmount()
    {
        return $this->totalOrderAmount;
    }

    /**
     * @param mixed $totalOrderAmount
     */
    public function setTotalOrderAmount($totalOrderAmount)
    {
        $this->totalOrderAmount = $totalOrderAmount;
    }

    /**
     * @return mixed
     */
    public function getFingerPrintId()
    {
        return $this->fingerPrintId;
    }

    /**
     * @param mixed $fingerPrintId
     */
    public function setFingerPrintId($fingerPrintId)
    {
        $this->fingerPrintId = $fingerPrintId;
    }

    /**
     * @return mixed
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @param mixed $browser
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;
    }

    /**
     * @return mixed
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param mixed $cart
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
    }

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
}