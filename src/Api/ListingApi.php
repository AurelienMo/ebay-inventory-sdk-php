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
    protected ClientInterface $client;

    protected Configuration $config;

    protected EbayClient $ebayClient;

    protected EbayRequest $ebayRequest;

    public function __construct(
        EbayClient $ebayClient = null,
        EbayRequest $ebayRequest = null,
        ClientInterface $client = null,
        Configuration $config = null,
    ) {
        $serializer = new Serializer();
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->ebayClient = $ebayClient ?: new EbayClient($this->client, $serializer);
        $this->ebayRequest = $ebayRequest ?: new EbayRequest(new HeaderSelector(), $this->config, $serializer);
    }

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * Operation bulkMigrateListing
     *
     * @param  BulkMigrateListing  $body  Details of the listings that needs to be migrated into Inventory (required)
     *
     * @return BulkMigrateListingResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function bulkMigrateListing(BulkMigrateListing $body): BulkMigrateListingResponse
    {
        $response = $this->bulkMigrateListingWithHttpInfo($body);

        return $response['data'];
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
        $returnType = BulkMigrateListingResponse::class;
        $request = $this->bulkMigrateListingRequest($body);

        return $this->ebayClient->sendRequest($request, $returnType);
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
