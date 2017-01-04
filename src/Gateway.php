<?php

namespace Omnipay\Paystack;

use Omnipay\Common\AbstractGateway;
use Omnipay\Paystack\Message\PurchaseRequest;

/**
 * Authorize an amount on the customers card
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = []) (Optional method)
 *
 * Authorize and immediately capture an amount on the customers card
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = [])  (Optional method)
 */
class Gateway extends AbstractGateway
{
    const BILLING_PLAN_FREQUENCY_DAY = 'day';
    const BILLING_PLAN_FREQUENCY_WEEK = 'week';
    const BILLING_PLAN_FREQUENCY_MONTH = 'month';
    const BILLING_PLAN_FREQUENCY_YEAR = 'year';

    const DRIVER_NAME = "Paystack";

    const SECRET_KEY = 'apiKey';
    

    public function getName() : string
    {
        return self::DRIVER_NAME;
    }

    public function authorize(array $parameters = [])
    {
        throw new \Exception();
    }

    public function capture(array $parameters = [])
    {
        throw new \Exception();
    }

    public function purchase(array $parameters = []) : PurchaseRequest
    {
        throw new \Exception();
    }

    public function refund(array $parameters = [])
    {
        throw new \Exception();
    }

    public function void(array $parameters = [])
    {
        throw new \Exception();
    }

    public function createCard(array $parameters = [])
    {
    }

    public function updateCard(array $parameters = [])
    {
        throw new \Exception();
    }

    public function deleteCard(array $parameters = [])
    {
        throw new \Exception();
    }
}
