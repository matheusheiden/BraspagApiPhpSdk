<?php


namespace Braspag\API\Request;


abstract class AbstractRequest
{

    public abstract function execute($param);

    protected abstract function unserialize($json);

    protected function _sendRequest($url, $method, $headers, $body = null, $auth = null, $flags = [])
    {
        if (!in_array('no_headers_merge', $flags)) {
            $defHeaders = [
                'Accept: application/json',
                'Accept-Encoding: gzip',
                'User-Agent: Braspag/3.0 PHP SDK',
            ];
            $headers = array_merge($headers, $defHeaders);
        }
        $curl = curl_init($url);
        if ($body !== null) {
            if (!in_array('body_is_json', $flags)) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
                $headers[] = 'Content-type: application/x-www-form-urlencoded';
            }
            else {
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
                $headers[] = 'Content-Type: application/json';
            }
        } else {
            $headers[] = 'Content-Length: 0';
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        if (!is_null($auth)) {
            curl_setopt($curl, CURLOPT_HTTPAUTH, $auth['type']);
            curl_setopt($curl, CURLOPT_USERPWD, $auth['username'] . ":" . $auth['password']);
        }

        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
//        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        switch ($method) {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, true);
                break;
            default:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        }


        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl)) {
            throw new \RuntimeException('Curl error: ' . curl_error($curl));
        }
        curl_close($curl);
        return $this->readResponse($statusCode, $response);
    }

    protected function readResponse($statusCode, $responseBody)
    {
        $unserialized = null;

        switch ($statusCode) {
            case 200:
            case 201:
                $unserialized = $this->unserialize($responseBody);
                break;
            case 400:
                $exception = null;
                $response = json_decode($responseBody);
                foreach ($response as $error) {
                    $cieloError = new BraspagError($error->Message, $error->Code);
                    $exception = new BraspagRequestException('Request Error', $statusCode, $exception);
                    $exception->setBraspagError($cieloError);
                }

                throw $exception;
            case 404:
                throw new BraspagRequestException('Resource not found', 404, null);
            default:
                throw new BraspagRequestException('Unknown status', $statusCode);
        }

        return $unserialized;
    }
}