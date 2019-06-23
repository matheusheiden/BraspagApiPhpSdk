<?php
namespace Braspag\API;

class Sale implements \JsonSerializable
{

    private $merchantOrderId;

    private $customer;

    private $payment;

    public function __construct($merchantOrderId = null)
    {
        $this->setMerchantOrderId($merchantOrderId);
    }

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    public function populate(\stdClass $data)
    {
        $dataProps = get_object_vars($data);

        if (isset($dataProps['Customer'])) {
            $this->customer = new \Braspag\API\Customer();
            $this->customer->populate($data->Customer);
        }

        if (isset($dataProps['Payment'])) {
            $this->payment = new \Braspag\API\Payment();
            $this->payment->populate($data->Payment);
        }

        if (isset($dataProps['MerchantOrderId'])) {
            $this->merchantOrderId = $data->MerchantOrderId;
        }
    }

    public static function fromJson($json)
    {
        $object = json_decode($json);

        $sale = new Sale();
        $sale->populate($object);

        return $sale;
    }

    public function customer($name)
    {
        $customer = new Customer($name);

        $this->setCustomer($customer);

        return $customer;
    }

    public function payment($amount, $installments = 1)
    {
        $payment = new Payment($amount, $installments);

        $this->setPayment($payment);

        return $payment;
    }

    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
        return $this;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;
        return $this;
    }
}
