<?php


namespace Braspag\API;


class Analysis implements \JsonSerializable
{
    private $merchantOrderId;
    private $totalOrderAmount;
    private $TransactionAmount; //String
    private $currency;
    private $provider;
    private $orderDate; //int
    private $braspagTransactionId;
    private $tid;
    private $nsu; //int
    private $authorizationCode;
    private $saleDate;
    private $card; //String
    private $billing;
    private $shipping;
    private $customer; //String
    private $cartItems;
    private $merchantDefinedData;
    private $bank; //String
    private $fundTransfer;
    private $invoice;
    private $airline; //String
    private $transactionId; //String
    private $status;
    private $providerAnalysisResult;

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
    private $links;

    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
    }

    public function getTotalOrderAmount()
    {
        return $this->totalOrderAmount;
    } //String

    public function setTotalOrderAmount($totalOrderAmount)
    {
        $this->totalOrderAmount = $totalOrderAmount;
    }

    public function getTransactionAmount()
    {
        return $this->TransactionAmount;
    }

    public function setTransactionAmount($TransactionAmount)
    {
        $this->TransactionAmount = $TransactionAmount;
    } //String

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($Currency)
    {
        $this->currency = $Currency;
    }

    public function getProvider()
    {
        return $this->provider;
    } //String

    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    } //String

    public function getBraspagTransactionId()
    {
        return $this->braspagTransactionId;
    }

    public function setBraspagTransactionId($braspagTransactionId)
    {
        $this->braspagTransactionId = $braspagTransactionId;
    }

    public function getTid()
    {
        return $this->tid;
    } //Card

    public function setTid($tid)
    {
        $this->tid = $tid;
    }

    public function getNsu()
    {
        return $this->nsu;
    }

    public function setNsu($nsu)
    {
        $this->nsu = $nsu;
    } //Billing

    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
    }

    public function getSaleDate()
    {
        return $this->saleDate;
    } //Shipping

    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;
    }

    public function getCard()
    {
        return $this->card;
    }

    public function setCard($Card)
    {
        $this->card = $Card;
    } //Customer

    public function getBilling()
    {
        return $this->billing;
    }

    public function setBilling($billing)
    {
        $this->billing = $billing;
    }

    public function getShipping()
    {
        return $this->shipping;
    } //array(CartItem)

    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
    } //array(MerchantDefinedData)

    public function getCartItems()
    {
        return $this->cartItems;
    }

    public function setCartItems($cartItems)
    {
        $this->cartItems = $cartItems;
    }

    public function getMerchantDefinedData()
    {
        return $this->merchantDefinedData;
    } //Bank

    public function setMerchantDefinedData($merchantDefinedData)
    {
        $this->merchantDefinedData = $merchantDefinedData;
    }

    public function getBank()
    {
        return $this->bank;
    }

    public function setBank($bank)
    {
        $this->bank = $bank;
    } //FundTransfer

    public function getFundTransfer()
    {
        return $this->fundTransfer;
    }

    public function setFundTransfer($fundTransfer)
    {
        $this->fundTransfer = $fundTransfer;
    }

    public function getInvoice()
    {
        return $this->invoice;
    } //Invoice

    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    public function getAirline()
    {
        return $this->airline;
    }

    public function setAirline($airline)
    {
        $this->airline = $airline;
    } //Airline

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
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->merchantOrderId = $data->MerchantOrderId ?? null;
        $this->totalOrderAmount = $data->TotalOrderAmount ?? null;
        $this->TransactionAmount = $data->TransactionAmount ?? null;
        $this->currency = $data->Currency ?? null;
        $this->provider = $data->Provider ?? null;
        $this->orderDate = $data->OrderDate ?? null;
        $this->braspagTransactionId = $data->BraspagTransactionId ?? null;
        $this->tid = $data->Tid ?? null;
        $this->nsu = $data->Nsu ?? null;
        $this->authorizationCode = $data->AuthorizationCode ?? null;
        $this->saleDate = $data->SaleDate ?? null;
        $this->card = $data->Card ?? null;
        $this->shipping = $data->Shipping ?? null;
        $this->billing = $data->Billing ?? null;
        $this->customer = $data->Customer ?? null;
        $this->cartItems = $data->CartItems ?? null;
        $this->merchantDefinedData = $data->MerchantDefinedData ?? null;
        $this->bank = $data->Bank ?? null;
        $this->fundTransfer = $data->FundTransfer ?? null;
        $this->invoice = $data->Invoice ?? null;
        $this->airline = $data->Airline ?? null;
        $this->transactionId = $data->TransactionId ?? null;
        $this->status = $data->Status ?? null;
        $this->links = $data->Links ?? null;
        $this->providerAnalysisResult = $data->ProviderAnalysisResult ?? null;
    }

    /**
     * @param $json
     * @return Analysis
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $analysis = new Analysis();

        $analysis->populate($object);

        return $analysis;
    }
}