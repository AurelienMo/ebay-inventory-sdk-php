<?php

namespace SapientPro\EbayInventorySDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayInventorySDK\Api\ListingApi;
use SapientPro\EbayInventorySDK\Enums\MarketplaceEnum;
use SapientPro\EbayInventorySDK\Models\BulkMigrateListing;
use SapientPro\EbayInventorySDK\Models\BulkMigrateListingResponse;
use SapientPro\EbayInventorySDK\Models\Error;
use SapientPro\EbayInventorySDK\Models\InventoryItemListing;
use SapientPro\EbayInventorySDK\Models\MigrateListing;
use SapientPro\EbayInventorySDK\Models\MigrateListingResponse;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ListingApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testBulkMigrateListing()
    {
        $requestBody = BulkMigrateListing::fromArray([
            'requests' => [
                MigrateListing::fromArray([
                    'listingId' => '1**********1'
                ]),
                MigrateListing::fromArray([
                    'listingId' => '1**********2'
                ]),
                MigrateListing::fromArray([
                    'listingId' => '1**********3'
                ])
            ]
        ]);

        $mockResponse = <<<JSON
{
    "responses": [
        {
            "statusCode": 200,
            "listingId": "1**********1",
            "inventoryItemGroupKey": "d********3",
            "marketplaceId": "EBAY_US",
            "inventoryItems": [
                {
                    "sku": "d********2",
                    "offerId": "5********1"
                },
                {
                    "sku": "d********3",
                    "offerId": "5********2"
                },
                {
                    "sku": "d********1",
                    "offerId": "5********3"
                },
                {
                    "sku": "d********4",
                    "offerId": "5********4"
                }
            ]
        },
        {
            "statusCode": 200,
            "listingId": "1**********2",
            "marketplaceId": "EBAY_US",
            "inventoryItems": [
                {
                    "sku": "d********t",
                    "offerId": "5********5"
                }
            ]
        },
        {
            "statusCode": 400,
            "marketplaceId": "EBAY_US",
            "errors": [
                {
                    "errorId": 25001,
                    "domain": "API_INVENTORY",
                    "subdomain": "Selling",
                    "category": "REQUEST",
                    "message": "item sku cannot be null or empty.",
                    "parameters": []
                }
            ]
        }
    ]
}
JSON;

        $expectedResponse = BulkMigrateListingResponse::fromArray([
            'responses' => [
                MigrateListingResponse::fromArray([
                    'statusCode' => 200,
                    'listingId' => '1**********1',
                    'inventoryItemGroupKey' => 'd********3',
                    'marketplaceId' => MarketplaceEnum::EBAY_US,
                    'inventoryItems' => [
                        InventoryItemListing::fromArray([
                            'sku' => 'd********2',
                            'offerId' => '5********1'
                        ]),
                        InventoryItemListing::fromArray([
                            'sku' => 'd********3',
                            'offerId' => '5********2'
                        ]),
                        InventoryItemListing::fromArray([
                            'sku' => 'd********1',
                            'offerId' => '5********3'
                        ]),
                        InventoryItemListing::fromArray([
                            'sku' => 'd********4',
                            'offerId' => '5********4'
                        ])
                    ]
                ]),
                MigrateListingResponse::fromArray([
                    'statusCode' => 200,
                    'listingId' => '1**********2',
                    'marketplaceId' => MarketplaceEnum::EBAY_US,
                    'inventoryItems' => [
                        InventoryItemListing::fromArray([
                            'sku' => 'd********t',
                            'offerId' => '5********5'
                        ])
                    ]
                ]),
                MigrateListingResponse::fromArray([
                    'statusCode' => 400,
                    'marketplaceId' => MarketplaceEnum::EBAY_US,
                    'errors' => [
                        Error::fromArray([
                            'errorId' => 25001,
                            'domain' => 'API_INVENTORY',
                            'subdomain' => 'Selling',
                            'category' => 'REQUEST',
                            'message' => 'item sku cannot be null or empty.',
                            'parameters' => []
                        ])
                    ]
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(ListingApi::class, $client);

        $response = $api->bulkMigrateListing($requestBody);

        $this->assertEquals($expectedResponse, $response);
    }
}
