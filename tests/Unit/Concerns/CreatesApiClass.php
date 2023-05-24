<?php

namespace SapientPro\EbayInventorySDK\Tests\Unit\Concerns;

use GuzzleHttp\Client;
use SapientPro\EbayInventorySDK\Api\ApiInterface;
use SapientPro\EbayInventorySDK\Client\EbayClient;
use SapientPro\EbayInventorySDK\Client\Serializer;

trait CreatesApiClass
{
    public function createApi(string $class, Client $client): ApiInterface
    {
        return new $class(new EbayClient($client, new Serializer()));
    }
}
