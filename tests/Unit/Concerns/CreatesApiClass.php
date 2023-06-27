<?php

namespace SapientPro\EbayInventorySDK\Tests\Unit\Concerns;

use GuzzleHttp\Client;
use SapientPro\EbayInventorySDK\Api\ApiInterface;
use SapientPro\EbayInventorySDK\Client\EbayClient;
use SapientPro\EbayInventorySDK\Client\Serializer;
use SapientPro\EbayInventorySDK\Configuration;

trait CreatesApiClass
{
    public function createApi(string $class, Client $client): ApiInterface
    {
        $configuration = (new Configuration())->setAccessToken('test');

        $api = new $class($configuration);
        $api->setEbayClient(new EbayClient($client, new Serializer()));

        return $api;
    }
}
