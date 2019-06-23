<?php
namespace Braspag\API\Request;

use Braspag\API\Merchant;
use Braspag\API\Sale;

abstract class AbstractSaleRequest extends AbstractRequest
{

    private $merchant;

    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }

    protected function sendRequest($method, $url, Sale $sale = null)
    {
        $headers = [
            'Accept: application/json',
            'Accept-Encoding: gzip',
            'User-Agent: Braspag/3.0 PHP SDK',
            'MerchantId: ' . $this->merchant->getId(),
            'MerchantKey: ' . $this->merchant->getKey(),
            'RequestId: ' . uniqid()
        ];
        $flags = ['no_headers_merge'];
        if ($sale) {
            $flags[] = 'body_is_json';
        }
        return $this->_sendRequest($url,$method, $headers,$sale,null, $flags);
    }


}
