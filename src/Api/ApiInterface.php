<?php

namespace SapientPro\EbayInventorySDK\Api;

use SapientPro\EbayInventorySDK\Client\EbayClient;
use SapientPro\EbayInventorySDK\Configuration;

interface ApiInterface
{
    public function getConfig(): Configuration;

    public function setEbayClient(EbayClient $ebayClient): void;
}
