<?php

namespace SapientPro\EbayInventorySDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayInventorySDK\Api\LocationApi;
use SapientPro\EbayInventorySDK\Enums\CountryCodeEnum;
use SapientPro\EbayInventorySDK\Enums\StatusEnum;
use SapientPro\EbayInventorySDK\Enums\StoreTypeEnum;
use SapientPro\EbayInventorySDK\Models\Address;
use SapientPro\EbayInventorySDK\Models\InventoryLocation;
use SapientPro\EbayInventorySDK\Models\InventoryLocationFull;
use SapientPro\EbayInventorySDK\Models\InventoryLocationResponse;
use SapientPro\EbayInventorySDK\Models\Location;
use SapientPro\EbayInventorySDK\Models\LocationDetails;
use SapientPro\EbayInventorySDK\Models\LocationResponse;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class LocationApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testCreateInventoryLocation()
    {
        $requestBody = InventoryLocationFull::fromArray([
            'location' => LocationDetails::fromArray([
                'address' => Address::fromArray([
                    'addressLine1' => '2********e',
                    'addressLine2' => 'B********3',
                    'city' => 'S*****e',
                    'stateOrProvince' => '**',
                    'postalCode' => '9***5',
                    'country' => CountryCodeEnum::US
                ])
            ]),
            'locationInstructions' => 'Items ship from here.',
            'name' => 'W********1',
            'merchantLocationStatus' => StatusEnum::ENABLED,
            'locationTypes' => [
                StoreTypeEnum::WAREHOUSE
            ]
        ]);

        $client = $this->prepareClientMock(204);
        $api = $this->createApi(LocationApi::class, $client);

        $result = $api->createInventoryLocationWithHttpInfo($requestBody, '1**********1');

        $this->assertEquals(204, $result['code']);
    }

    public function testDeleteInventoryLocation()
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(LocationApi::class, $client);

        $result = $api->deleteInventoryLocationWithHttpInfo('1**********1');

        $this->assertEquals(204, $result['code']);
    }

    public function testDisableInventoryLocation()
    {
        $client = $this->prepareClientMock(200);
        $api = $this->createApi(LocationApi::class, $client);

        $result = $api->disableInventoryLocationWithHttpInfo('1**********1');

        $this->assertEquals(200, $result['code']);
    }

    public function testEnableInventoryLocation()
    {
        $client = $this->prepareClientMock(200);
        $api = $this->createApi(LocationApi::class, $client);

        $result = $api->enableInventoryLocationWithHttpInfo('1**********1');

        $this->assertEquals(200, $result['code']);
    }

    public function testGetInventoryLocation()
    {
        $mockResponseBody = <<<JSON
{
    "name": "W********1",
    "location": {
        "address": {
            "addressLine1": "2********e",
            "addressLine2": "B********3",
            "city": "S******e",
            "stateOrProvince": "**",
            "postalCode": "9***8",
            "country": "US"
        },
        "locationId": "5******************************A"
    },
    "merchantLocationStatus": "ENABLED",
    "locationTypes": [
        "WAREHOUSE"
    ],
    "merchantLocationKey": "W********1"
}
JSON;

        $expectedResponse = InventoryLocationResponse::fromArray([
            'name' => 'W********1',
            'location' => Location::fromArray([
                'address' => Address::fromArray([
                    'addressLine1' => '2********e',
                    'addressLine2' => 'B********3',
                    'city' => 'S******e',
                    'stateOrProvince' => '**',
                    'postalCode' => '9***8',
                    'country' => CountryCodeEnum::US
                ]),
                'locationId' => '5******************************A'
            ]),
            'merchantLocationStatus' => StatusEnum::ENABLED,
            'locationTypes' => [
                StoreTypeEnum::WAREHOUSE
            ],
            'merchantLocationKey' => 'W********1'
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(LocationApi::class, $client);

        $result = $api->getInventoryLocation('1**********1');

        $this->assertEquals($expectedResponse, $result);
    }

    public function testGetInventoryLocations()
    {
        $mockResponseBody = <<<JSON
{
    "total": 3,
    "locations": [
        {
            "name": "W********1",
            "location": {
                "locationId": "4******************************A",
                "address": {
                    "city": "S******e",
                    "stateOrProvince": "**",
                    "postalCode": "9***5",
                    "country": "US"
                }
            },
            "merchantLocationStatus": "ENABLED",
            "locationTypes": [
                "WAREHOUSE"
            ],
            "merchantLocationKey": "W********1"
        },
        {
            "name": "W********2",
            "location": {
                "locationId": "4******************************A",
                "address": {
                    "city": "D******s",
                    "stateOrProvince": "**",
                    "postalCode": "7***1",
                    "country": "US"
                }
            },
            "merchantLocationStatus": "ENABLED",
            "locationTypes": [
                "WAREHOUSE"
            ],
            "merchantLocationKey": "W********2"
        },
        {
            "name": "W********3",
            "location": {
                "locationId": "4******************************A",
                "address": {
                    "city": "N******y",
                    "stateOrProvince": "**",
                    "postalCode": "1***0",
                    "country": "US"
                }
            },
            "merchantLocationStatus": "DISABLED",
            "locationTypes": [
                "WAREHOUSE"
            ],
            "merchantLocationKey": "W********3"
        }
    ]
}
JSON;

        $expectedResponse = LocationResponse::fromArray([
            'total' => 3,
            'locations' => [
                InventoryLocationResponse::fromArray([
                    'name' => 'W********1',
                    'location' => Location::fromArray([
                        'locationId' => '4******************************A',
                        'address' => Address::fromArray([
                            'city' => 'S******e',
                            'stateOrProvince' => '**',
                            'postalCode' => '9***5',
                            'country' => CountryCodeEnum::US
                        ])
                    ]),
                    'merchantLocationStatus' => StatusEnum::ENABLED,
                    'locationTypes' => [
                        StoreTypeEnum::WAREHOUSE
                    ],
                    'merchantLocationKey' => 'W********1'
                ]),
                InventoryLocationResponse::fromArray([
                    'name' => 'W********2',
                    'location' => Location::fromArray([
                        'locationId' => '4******************************A',
                        'address' => Address::fromArray([
                            'city' => 'D******s',
                            'stateOrProvince' => '**',
                            'postalCode' => '7***1',
                            'country' => CountryCodeEnum::US
                        ])
                    ]),
                    'merchantLocationStatus' => StatusEnum::ENABLED,
                    'locationTypes' => [
                        StoreTypeEnum::WAREHOUSE
                    ],
                    'merchantLocationKey' => 'W********2'
                ]),
                InventoryLocationResponse::fromArray([
                    'name' => 'W********3',
                    'location' => Location::fromArray([
                        'locationId' => '4******************************A',
                        'address' => Address::fromArray([
                            'city' => 'N******y',
                            'stateOrProvince' => '**',
                            'postalCode' => '1***0',
                            'country' => CountryCodeEnum::US
                        ])
                    ]),
                    'merchantLocationStatus' => StatusEnum::DISABLED,
                    'locationTypes' => [
                        StoreTypeEnum::WAREHOUSE
                    ],
                    'merchantLocationKey' => 'W********3'
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(LocationApi::class, $client);

        $result = $api->getInventoryLocations();

        $this->assertEquals($expectedResponse, $result);
    }

    public function testUpdateInventoryLocation()
    {
        $requestBody = InventoryLocation::fromArray([
            'name' => 'W********h',
            'locationInstructions' => 'E****************g.',
            'locationAdditionalInformation' => 'Available for drop-off on Mondays only.',
            'locationWebUrl' => 'http://www.e*****e.com/w*****1',
            'phone' => '***-***-****'
        ]);

        $client = $this->prepareClientMock(204);
        $api = $this->createApi(LocationApi::class, $client);

        $result = $api->updateInventoryLocationWithHttpInfo($requestBody, 'W********1');

        $this->assertEquals(204, $result['code']);
    }
}
