<?php

namespace SapientPro\EbayInventorySDK\Api;

use SapientPro\EbayInventorySDK\ApiException;
use SapientPro\EbayInventorySDK\Client\EbayClient;
use SapientPro\EbayInventorySDK\Client\EbayRequest;
use SapientPro\EbayInventorySDK\Client\Serializer;
use SapientPro\EbayInventorySDK\Configuration;
use SapientPro\EbayInventorySDK\HeaderSelector;
use SapientPro\EbayInventorySDK\Models\BulkMigrateListing;
use SapientPro\EbayInventorySDK\Models\BulkMigrateListingResponse;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ListingApi implements ApiInterface
{
    private EbayClient $ebayClient;

    private EbayRequest $ebayRequest;

    private Configuration $config;

    public function __construct(Configuration $config)
    {
        $this->config = $config;

        $serializer = new Serializer();
        $client = new Client();

        $this->ebayClient = new EbayClient($client, $serializer);
        $this->ebayRequest = new EbayRequest(
            new HeaderSelector(),
            $this->config,
            $serializer
        );
    }

    public function getConfig(): Configuration
    {
        return $this->config;
    }

    public function setEbayClient(EbayClient $ebayClient): void
    {
        $this->ebayClient = $ebayClient;
    }

    /**
     * Operation bulkMigrateListing
     *
     * @param  BulkMigrateListing  $body  Details of the listings that needs to be migrated into Inventory (required)
     *
     * @return BulkMigrateListingResponse|null
     * @throws ApiException on non-2xx response
     */
    public function bulkMigrateListing(BulkMigrateListing $body): ?BulkMigrateListingResponse
    {
        $response = $this->bulkMigrateListingWithHttpInfo($body);

        return $response['data'] ?? null;
    }

    /**
     * Operation bulkMigrateListingWithHttpInfo
     *
     * @param  BulkMigrateListing  $body  Details of the listings that needs to be migrated into Inventory (required)
     *
     * @return array of BulkMigrateListingResponse, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     */
    public function bulkMigrateListingWithHttpInfo(BulkMigrateListing $body): array
    {
        $request = $this->bulkMigrateListingRequest($body);

        return $this->ebayClient->sendRequest($request, returnType: BulkMigrateListingResponse::class);
    }

    /**
     * Create request for operation 'bulkMigrateListing'
     *
     * @param  BulkMigrateListing  $body  Details of the listings that needs to be migrated into Inventory (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function bulkMigrateListingRequest(BulkMigrateListing $body): Request
    {
        $resourcePath = '/bulk_migrate_listing';

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }
}
