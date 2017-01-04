<?php

namespace Omnipay\Paystack\Message;

use Omnipay\Common\Message\AbstractRequest as BaseRequest;

abstract class AbstractRequest extends BaseRequest
{

    const API_BASE_URI = 'https://api.paystack.co';

    const SECRET_KEY = 'apiKey';

    public function sendData($data)
    {

        $config = $this->httpClient->getConfig();

        $curlOptions = $config->get('curl.options');
        $curlOptions[CURLOPT_SSLVERSION] = 6;

        $config->set('curl.options', $curlOptions);

        $this->httpClient->setConfig($config);

        $this->httpClient->getEventDispatcher()->addListener(
            'request.error',
            function (Event $event) {
                if ($event['response']->isClientError()) {
                    $event->stopPropagation();
                }
            }
        );

        $httpRequest = $this->httpClient->createRequest(
            $this->getHttpMethod(),
            $this->getApiEndPoint(),
            null,
            $data
        );

        $httpRequest->setHeader('Authorization', 'Bearer ' . $this->getApiKey());

        $httpResponse = $httpRequest->send();

        $this->response = new Response($this, $httpResponse->json());

        if ($httpResponse->hasHeader('Request-Id')) {
            $this->response->setRequestId((string)$httpResponse->getHeader('Request-Id'));
        }

        return $this->response;
    }

    public function getHttpMethod():string
    {
        return 'POST';
    }

    public function getApiEndPoint() : string
    {
        return self::API_BASE_URI;
    }

    protected function getApiKey()
    {
        return $this->getParameter(self::SECRET_KEY);
    }
}
