<?php

namespace SapientPro\EbayInventorySDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayInventorySDK\Api\OfferApi;
use SapientPro\EbayInventorySDK\Enums\CurrencyCodeEnum;
use SapientPro\EbayInventorySDK\Enums\FormatTypeEnum;
use SapientPro\EbayInventorySDK\Enums\ListingStatusEnum;
use SapientPro\EbayInventorySDK\Enums\LocaleEnum;
use SapientPro\EbayInventorySDK\Enums\MarketplaceEnum;
use SapientPro\EbayInventorySDK\Enums\MinimumAdvertisedPriceHandlingEnum;
use SapientPro\EbayInventorySDK\Enums\OfferStatusEnum;
use SapientPro\EbayInventorySDK\Enums\ShippingServiceTypeEnum;
use SapientPro\EbayInventorySDK\Enums\SoldOnEnum;
use SapientPro\EbayInventorySDK\Models\Amount;
use SapientPro\EbayInventorySDK\Models\BulkEbayOfferDetailsWithKeys;
use SapientPro\EbayInventorySDK\Models\BulkOffer;
use SapientPro\EbayInventorySDK\Models\BulkOfferResponse;
use SapientPro\EbayInventorySDK\Models\BulkPublishResponse;
use SapientPro\EbayInventorySDK\Models\EbayOfferDetailsWithAll;
use SapientPro\EbayInventorySDK\Models\EbayOfferDetailsWithId;
use SapientPro\EbayInventorySDK\Models\EbayOfferDetailsWithKeys;
use SapientPro\EbayInventorySDK\Models\Fee;
use SapientPro\EbayInventorySDK\Models\FeesSummaryResponse;
use SapientPro\EbayInventorySDK\Models\FeeSummary;
use SapientPro\EbayInventorySDK\Models\ListingDetails;
use SapientPro\EbayInventorySDK\Models\ListingPolicies;
use SapientPro\EbayInventorySDK\Models\OfferKeysWithId;
use SapientPro\EbayInventorySDK\Models\OfferKeyWithId;
use SapientPro\EbayInventorySDK\Models\OfferResponse;
use SapientPro\EbayInventorySDK\Models\OfferResponseWithListingId;
use SapientPro\EbayInventorySDK\Models\Offers;
use SapientPro\EbayInventorySDK\Models\OfferSkuResponse;
use SapientPro\EbayInventorySDK\Models\PricingSummary;
use SapientPro\EbayInventorySDK\Models\PublishByInventoryItemGroupRequest;
use SapientPro\EbayInventorySDK\Models\PublishResponse;
use SapientPro\EbayInventorySDK\Models\ShippingCostOverride;
use SapientPro\EbayInventorySDK\Models\Tax;
use SapientPro\EbayInventorySDK\Models\WithdrawByInventoryItemGroupRequest;
use SapientPro\EbayInventorySDK\Models\WithdrawResponse;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class OfferApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testBulkCreateOffer()
    {
        $requestBody = BulkEbayOfferDetailsWithKeys::fromArray([
            'requests' => [
                EbayOfferDetailsWithKeys::fromArray([
                    'sku' => 'S********F',
                    'marketplaceId' => MarketplaceEnum::EBAY_US,
                    'format' => FormatTypeEnum::FIXED_PRICE,
                    'categoryId' => '30120',
                    'pricingSummary' => PricingSummary::fromArray([
                        'price' => Amount::fromArray([
                            'value' => '100',
                            'currency' => CurrencyCodeEnum::USD->value
                        ]),
                        'originalRetailPrice' => Amount::fromArray([
                            'value' => '120',
                            'currency' => CurrencyCodeEnum::USD->value
                        ]),
                        'minimumAdvertisedPrice' => Amount::fromArray([
                            'value' => '95',
                            'currency' => CurrencyCodeEnum::USD->value
                        ]),
                        'pricingVisibility' => MinimumAdvertisedPriceHandlingEnum::PRE_CHECKOUT,
                        'originallySoldForRetailPriceOn' => SoldOnEnum::ON_EBAY
                    ]),
                    'storeCategoryNames' => [
                        'shirts',
                        'accessories'
                    ],
                    'listingPolicies' => ListingPolicies::fromArray([
                        'fulfillmentPolicyId' => '7********1',
                        'returnPolicyId' => '6********1',
                        'paymentPolicyId' => '6********1',
                        'shippingCostOverrides' => [
                            ShippingCostOverride::fromArray([
                                'shippingCost' => Amount::fromArray([
                                    'value' => '0',
                                    'currency' => CurrencyCodeEnum::USD->value
                                ]),
                                'additionalShippingCost' => Amount::fromArray([
                                    'value' => '0',
                                    'currency' => CurrencyCodeEnum::USD->value
                                ]),
                                'priority' => 1,
                                'shippingServiceType' => ShippingServiceTypeEnum::DOMESTIC
                            ])
                        ]
                    ]),
                ]),
                EbayOfferDetailsWithKeys::fromArray([
                    'sku' => 'S********L',
                    'marketplaceId' => MarketplaceEnum::EBAY_US,
                    'format' => FormatTypeEnum::FIXED_PRICE,
                    'categoryId' => '30120',
                    'pricingSummary' => PricingSummary::fromArray([
                        'price' => Amount::fromArray([
                            'value' => '100',
                            'currency' => CurrencyCodeEnum::USD->value
                        ]),
                        'originalRetailPrice' => Amount::fromArray([
                            'value' => '120',
                            'currency' => CurrencyCodeEnum::USD->value
                        ]),
                        'minimumAdvertisedPrice' => Amount::fromArray([
                            'value' => '95',
                            'currency' => CurrencyCodeEnum::USD->value
                        ]),
                        'pricingVisibility' => MinimumAdvertisedPriceHandlingEnum::PRE_CHECKOUT,
                        'originallySoldForRetailPriceOn' => SoldOnEnum::ON_EBAY
                    ]),
                    'listingPolicies' => ListingPolicies::fromArray([
                        'fulfillmentPolicyId' => '7********1',
                        'returnPolicyId' => '6********1',
                        'paymentPolicyId' => '6********1',
                        'shippingCostOverrides' => [
                            ShippingCostOverride::fromArray([
                                'shippingCost' => Amount::fromArray([
                                    'value' => '0',
                                    'currency' => CurrencyCodeEnum::USD->value
                                ]),
                                'additionalShippingCost' => Amount::fromArray([
                                    'value' => '0',
                                    'currency' => CurrencyCodeEnum::USD->value
                                ]),
                                'priority' => 1,
                                'shippingServiceType' => ShippingServiceTypeEnum::DOMESTIC
                            ])
                        ]
                    ]),
                    'tax' => Tax::fromArray([
                        'applyTax' => true
                    ]),
                    'listingDescription' => 'With a stunning 5.7 inch Quad HD display and a powerful octa-core processor, it\'s the Lumia you\'ve been waiting for. Get the phone that works like your PC and push the limits of what\'s possible.',
                    'quantityLimitPerBuyer' => 5,
                    'merchantLocationKey' => 'S****1',
                    'includeCatalogProductDetails' => true
                ])
            ]
        ]);

        $mockResponseBody = <<<JSON
{
    "responses": [
        {
            "statusCode": 200,
            "sku": "S********F",
            "offerId": "3********6",
            "marketplaceId": "EBAY_US",
            "format": "FIXED_PRICE"
        },
        {
            "statusCode": 200,
            "sku": "S********L",
            "offerId": "3********7",
            "marketplaceId": "EBAY_US",
            "format": "FIXED_PRICE"
        }
    ]
}
JSON;

        $expectedResponse = BulkOfferResponse::fromArray([
            'responses' => [
                OfferSkuResponse::fromArray([
                    'statusCode' => 200,
                    'sku' => 'S********F',
                    'offerId' => '3********6',
                    'marketplaceId' => MarketplaceEnum::EBAY_US,
                    'format' => FormatTypeEnum::FIXED_PRICE
                ]),
                OfferSkuResponse::fromArray([
                    'statusCode' => 200,
                    'sku' => 'S********L',
                    'offerId' => '3********7',
                    'marketplaceId' => MarketplaceEnum::EBAY_US,
                    'format' => FormatTypeEnum::FIXED_PRICE
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(OfferApi::class, $client);

        $response = $api->bulkCreateOffer($requestBody, LocaleEnum::en_US);

        $this->assertEquals($expectedResponse, $response);
    }

    public function testBulkPublishOffer()
    {
        $requestBody = BulkOffer::fromArray([
            'requests' => [
                OfferKeyWithId::fromArray([
                    'offerId' => '5********1'
                ]),
                OfferKeyWithId::fromArray([
                    'offerId' => '5********2'
                ])
            ]
        ]);

        $mockResponseBody = <<<JSON
{
    "responses": [
        {
            "statusCode": 200,
            "offerId": "5**********1",
            "listingId": "2********1"
        },
        {
            "statusCode": 200,
            "offerId": "5********1",
            "listingId": "2**********7"
        }
    ]
}
JSON;

        $expectedResponse = BulkPublishResponse::fromArray([
            'responses' => [
                OfferResponseWithListingId::fromArray([
                    'statusCode' => 200,
                    'offerId' => '5**********1',
                    'listingId' => '2********1'
                ]),
                OfferResponseWithListingId::fromArray([
                    'statusCode' => 200,
                    'offerId' => '5********1',
                    'listingId' => '2**********7'
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(OfferApi::class, $client);

        $response = $api->bulkPublishOffer($requestBody);

        $this->assertEquals($expectedResponse, $response);
    }

    public function testCreateOffer()
    {
        $requestBody = EbayOfferDetailsWithKeys::fromArray([
            'sku' => '3***********5',
            'marketplaceId' => MarketplaceEnum::EBAY_US,
            'format' => FormatTypeEnum::FIXED_PRICE,
            'availableQuantity' => 75,
            'categoryId' => '30120',
            'listingDescription' => 'Lumia phone with a stunning 5.7 inch Quad HD display and a powerful octa-core processor.',
            'listingPolicies' => ListingPolicies::fromArray([
                'fulfillmentPolicyId' => '3*********0',
                'paymentPolicyId' => '3*********0',
                'returnPolicyId' => '3*********0'
            ]),
            'pricingSummary' => PricingSummary::fromArray([
                'price' => Amount::fromArray([
                    'currency' => CurrencyCodeEnum::USD->value,
                    'value' => '272.17'
                ])
            ]),
            'quantityLimitPerBuyer' => 2,
            'includeCatalogProductDetails' => true
        ]);

        $mockResponseBody = <<<JSON
{
    "offerId": "1*********1"
}
JSON;

        $expectedResponse = OfferResponse::fromArray([
            'offerId' => '1*********1'
        ]);

        $client = $this->prepareClientMock(201, $mockResponseBody, [
            'Content-Language' => 'en-US'
        ]);
        $api = $this->createApi(OfferApi::class, $client);

        $response = $api->createOffer($requestBody, LocaleEnum::en_US);

        $this->assertEquals($expectedResponse, $response);
    }

    public function testDeleteOffer()
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(OfferApi::class, $client);

        $result = $api->deleteOfferWithHttpInfo('5*********1');

        $this->assertEquals(204, $result['code']);
    }

    public function testGetListingFees()
    {
        $requestBody = OfferKeysWithId::fromArray([
            'offers' => [
                OfferKeyWithId::fromArray([
                    'offerId' => '1*********1'
                ]),
                OfferKeyWithId::fromArray([
                    'offerId' => '1*********2'
                ])
            ]
        ]);

        $mockResponseBody = <<<JSON
{
    "feeSummaries": [
        {
            "fees": [
                {
                    "amount": {
                        "currency": "USD",
                        "value": "0.3"
                    },
                    "feeType": "InsertionFee"
                },
                {
                    "amount": {
                        "currency": "USD",
                        "value": "0.5"
                    },
                    "feeType": "SubtitleFee"
                }
            ],
            "marketplaceId": "EBAY_US"
        },
        {
            "fees": [
                {
                    "amount": {
                        "currency": "GBP",
                        "value": "0.23"
                    },
                    "feeType": "InsertionFee"
                },
                {
                    "amount": {
                        "currency": "GBP",
                        "value": "0.39"
                    },
                    "feeType": "SubtitleFee"
                }
            ],
            "marketplaceId": "EBAY_GB"
        }
    ]
}
JSON;

        $expectedResponse = FeesSummaryResponse::fromArray([
            'feeSummaries' => [
                FeeSummary::fromArray([
                    'fees' => [
                        Fee::fromArray([
                            'amount' => Amount::fromArray([
                                'currency' => CurrencyCodeEnum::USD->value,
                                'value' => '0.3'
                            ]),
                            'feeType' => 'InsertionFee'
                        ]),
                        Fee::fromArray([
                            'amount' => Amount::fromArray([
                                'currency' => CurrencyCodeEnum::USD->value,
                                'value' => '0.5'
                            ]),
                            'feeType' => 'SubtitleFee'
                        ])
                    ],
                    'marketplaceId' => MarketplaceEnum::EBAY_US
                ]),
                FeeSummary::fromArray([
                    'fees' => [
                        Fee::fromArray([
                            'amount' => Amount::fromArray([
                                'currency' => CurrencyCodeEnum::GBP->value,
                                'value' => '0.23'
                            ]),
                            'feeType' => 'InsertionFee'
                        ]),
                        Fee::fromArray([
                            'amount' => Amount::fromArray([
                                'currency' => CurrencyCodeEnum::GBP->value,
                                'value' => '0.39'
                            ]),
                            'feeType' => 'SubtitleFee'
                        ])
                    ],
                    'marketplaceId' => MarketplaceEnum::EBAY_GB
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(OfferApi::class, $client);

        $response = $api->getListingFees($requestBody);

        $this->assertEquals($expectedResponse, $response);
    }

    public function testGetOffer()
    {
        $mockResponseBody = <<<JSON
{
    "offerId": "1*********1",
    "sku": "3***********5",
    "marketplaceId": "EBAY_US",
    "format": "FIXED_PRICE",
    "availableQuantity": 70,
    "categoryId": "30120",
    "listing": {
        "listingId": "2*********1",
        "listingStatus": "ACTIVE",
        "soldQuantity": 5
    },
    "listingDescription": "Lumia phone with a stunning 5.7 inch Quad HD display and a powerful octa-core processor.",
    "listingPolicies": {
        "fulfillmentPolicyId": "3*********0",
        "paymentPolicyId": "3*********0",
        "returnPolicyId": "3*********0"
    },
    "pricingSummary": {
        "price": {
            "currency": "USD",
            "value": "260.00"
        }
    },
    "quantityLimitPerBuyer": 2,
    "status": "PUBLISHED",
    "includeCatalogProductDetails": false
}
JSON;

        $expectedResponse = EbayOfferDetailsWithAll::fromArray([
            'offerId' => '1*********1',
            'sku' => '3***********5',
            'marketplaceId' => MarketplaceEnum::EBAY_US,
            'format' => FormatTypeEnum::FIXED_PRICE,
            'availableQuantity' => 70,
            'categoryId' => '30120',
            'listing' => ListingDetails::fromArray([
                'listingId' => '2*********1',
                'listingStatus' => ListingStatusEnum::ACTIVE,
                'soldQuantity' => 5
            ]),
            'listingDescription' => 'Lumia phone with a stunning 5.7 inch Quad HD display and a powerful octa-core processor.',
            'listingPolicies' => ListingPolicies::fromArray([
                'fulfillmentPolicyId' => '3*********0',
                'paymentPolicyId' => '3*********0',
                'returnPolicyId' => '3*********0'
            ]),
            'pricingSummary' => PricingSummary::fromArray([
                'price' => Amount::fromArray([
                    'currency' => CurrencyCodeEnum::USD->value,
                    'value' => '260.00'
                ])
            ]),
            'quantityLimitPerBuyer' => 2,
            'status' => OfferStatusEnum::PUBLISHED,
            'includeCatalogProductDetails' => false
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(OfferApi::class, $client);

        $response = $api->getOffer('1*********1');

        $this->assertEquals($expectedResponse, $response);
    }

    public function testGetOffers()
    {
        $mockResponseBody = <<<JSON
{
    "total": 2,
    "size": 2,
    "href": "/sell/inventory/v1/offer?offset=0&limit=100",
    "limit": 100,
    "offers": [
        {
            "offerId": "1*********1",
            "sku": "3***********5",
            "marketplaceId": "EBAY_US",
            "format": "FIXED_PRICE",
            "availableQuantity": 70,
            "categoryId": "30120",
            "listing": {
                "listingId": "2*********1",
                "listingStatus": "ACTIVE",
                "soldQuantity": 5
            },
            "listingDescription": "Lumia phone with a stunning 5.7 inch Quad HD display and a powerful octa-core processor.",
            "listingPolicies": {
                "fulfillmentPolicyId": "3*********0",
                "paymentPolicyId": "3*********0",
                "returnPolicyId": "3*********0"
            },
            "pricingSummary": {
                "price": {
                    "currency": "USD",
                    "value": "260.00"
                }
            },
            "quantityLimitPerBuyer": 2,
            "status": "PUBLISHED",
            "includeCatalogProductDetails": false
        },
        {
            "offerId": "1*********2",
            "sku": "3***********5",
            "marketplaceId": "EBAY_GB",
            "format": "FIXED_PRICE",
            "availableQuantity": 0,
            "categoryId": "9355",
            "listing": {
                "listingId": "2*********2",
                "listingStatus": "OUT_OF_STOCK",
                "soldQuantity": 45
            },
            "listingDescription": "Lumia phone with a stunning 5.7 inch Quad HD display and a powerful octa-core processor.",
            "listingPolicies": {
                "fulfillmentPolicyId": "3*********0",
                "paymentPolicyId": "3*********0",
                "returnPolicyId": "3*********0"
            },
            "pricingSummary": {
                "price": {
                    "currency": "GBP",
                    "value": "200.77"
                }
            },
            "quantityLimitPerBuyer": 4,
            "status": "PUBLISHED",
            "includeCatalogProductDetails": true
        }
    ]
}
JSON;

        $expectedResponse = Offers::fromArray([
            'total' => 2,
            'size' => 2,
            'href' => '/sell/inventory/v1/offer?offset=0&limit=100',
            'limit' => 100,
            'offers' => [
                EbayOfferDetailsWithAll::fromArray([
                    'offerId' => '1*********1',
                    'sku' => '3***********5',
                    'marketplaceId' => MarketplaceEnum::EBAY_US,
                    'format' => FormatTypeEnum::FIXED_PRICE,
                    'availableQuantity' => 70,
                    'categoryId' => '30120',
                    'listing' => ListingDetails::fromArray([
                        'listingId' => '2*********1',
                        'listingStatus' => ListingStatusEnum::ACTIVE,
                        'soldQuantity' => 5
                    ]),
                    'listingDescription' => 'Lumia phone with a stunning 5.7 inch Quad HD display and a powerful octa-core processor.',
                    'listingPolicies' => ListingPolicies::fromArray([
                        'fulfillmentPolicyId' => '3*********0',
                        'paymentPolicyId' => '3*********0',
                        'returnPolicyId' => '3*********0'
                    ]),
                    'pricingSummary' => PricingSummary::fromArray([
                        'price' => Amount::fromArray([
                            'currency' => CurrencyCodeEnum::USD->value,
                            'value' => '260.00'
                        ])
                    ]),
                    'quantityLimitPerBuyer' => 2,
                    'status' => OfferStatusEnum::PUBLISHED,
                    'includeCatalogProductDetails' => false
                ]),
                EbayOfferDetailsWithAll::fromArray([
                    'offerId' => '1*********2',
                    'sku' => '3***********5',
                    'marketplaceId' => MarketplaceEnum::EBAY_GB,
                    'format' => FormatTypeEnum::FIXED_PRICE,
                    'availableQuantity' => 0,
                    'categoryId' => '9355',
                    'listing' => ListingDetails::fromArray([
                        'listingId' => '2*********2',
                        'listingStatus' => ListingStatusEnum::OUT_OF_STOCK,
                        'soldQuantity' => 45
                    ]),
                    'listingDescription' => 'Lumia phone with a stunning 5.7 inch Quad HD display and a powerful octa-core processor.',
                    'listingPolicies' => ListingPolicies::fromArray([
                        'fulfillmentPolicyId' => '3*********0',
                        'paymentPolicyId' => '3*********0',
                        'returnPolicyId' => '3*********0'
                    ]),
                    'pricingSummary' => PricingSummary::fromArray([
                        'price' => Amount::fromArray([
                            'currency' => CurrencyCodeEnum::GBP->value,
                            'value' => '200.77'
                        ])
                    ]),
                    'quantityLimitPerBuyer' => 4,
                    'status' => OfferStatusEnum::PUBLISHED,
                    'includeCatalogProductDetails' => true
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(OfferApi::class, $client);

        $response = $api->getOffers('3***********5');

        $this->assertEquals($expectedResponse, $response);
    }

    public function testPublishOffer()
    {
        $mockResponseBody = <<<JSON
{
    "listingId": "2*********1"
}
JSON;

        $expectedResponse = PublishResponse::fromArray([
            'listingId' => '2*********1'
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(OfferApi::class, $client);

        $result = $api->publishOffer('id');

        $this->assertEquals($expectedResponse, $result);
    }

    public function testPublishOfferByInventoryItemGroup()
    {
        $requestBody = PublishByInventoryItemGroupRequest::fromArray([
            'inventoryItemGroupKey' => "0*********1_GRP",
            'marketplaceId' => MarketplaceEnum::EBAY_US
        ]);

        $mockResponseBody = <<<JSON
{
    "listingId": "1**********4"
}
JSON;

        $expectedResponse = PublishResponse::fromArray([
            'listingId' => '1**********4'
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(OfferApi::class, $client);

        $result = $api->publishOfferByInventoryItemGroup($requestBody);

        $this->assertEquals($expectedResponse, $result);
    }

    public function testUpdateOffer()
    {
        $requestBody = EbayOfferDetailsWithId::fromArray([
            'availableQuantity' => 60,
            'categoryId' => '30120',
            'listingDescription' => 'Lumia phone with a stunning 5.7 inch Quad HD display and a powerful octa-core processor.',
            'listingPolicies' => ListingPolicies::fromArray([
                'fulfillmentPolicyId' => '3*********0',
                'paymentPolicyId' => '3*********0',
                'returnPolicyId' => '3*********0'
            ]),
            'pricingSummary' => PricingSummary::fromArray([
                'price' => Amount::fromArray([
                    'currency' => CurrencyCodeEnum::USD->value,
                    'value' => '260.00'
                ])
            ]),
            'quantityLimitPerBuyer' => 3,
            'includeCatalogProductDetails' => true
        ]);

        $client = $this->prepareClientMock(204);
        $api = $this->createApi(OfferApi::class, $client);

        $result = $api->updateOfferWithHttpInfo(
            $requestBody,
            LocaleEnum::en_US,
            '3***********5'
        );

        $this->assertEquals(204, $result['code']);
    }

    public function testWithdrawOffer()
    {
        $mockResponseBody = <<<JSON
{
    "listingId": "3***********6"
}
JSON;

        $expectedResponse = WithdrawResponse::fromArray([
            'listingId' => '3***********6'
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(OfferApi::class, $client);

        $result = $api->withdrawOffer('id');

        $this->assertEquals($expectedResponse, $result);
    }

    public function testWithdrawOfferByInventoryItemGroup()
    {
        $requestBody = WithdrawByInventoryItemGroupRequest::fromArray([
            'inventoryItemGroupKey' => "0*********1_GRP",
            'marketplaceId' => MarketplaceEnum::EBAY_US
        ]);

        $client = $this->prepareClientMock(204);
        $api = $this->createApi(OfferApi::class, $client);

        $result = $api->withdrawOfferByInventoryItemGroupWithHttpInfo($requestBody);

        $this->assertEquals(204, $result['code']);
    }
}
