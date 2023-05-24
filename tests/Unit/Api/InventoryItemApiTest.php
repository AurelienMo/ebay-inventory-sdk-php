<?php

namespace SapientPro\EbayInventorySDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayInventorySDK\Api\InventoryItemApi;
use SapientPro\EbayInventorySDK\Enums\ConditionEnum;
use SapientPro\EbayInventorySDK\Enums\CurrencyCodeEnum;
use SapientPro\EbayInventorySDK\Enums\LocaleEnum;
use SapientPro\EbayInventorySDK\Models\Amount;
use SapientPro\EbayInventorySDK\Models\Availability;
use SapientPro\EbayInventorySDK\Models\AvailabilityWithAll;
use SapientPro\EbayInventorySDK\Models\BulkGetInventoryItem;
use SapientPro\EbayInventorySDK\Models\BulkGetInventoryItemResponse;
use SapientPro\EbayInventorySDK\Models\BulkInventoryItem;
use SapientPro\EbayInventorySDK\Models\BulkInventoryItemResponse;
use SapientPro\EbayInventorySDK\Models\BulkPriceQuantity;
use SapientPro\EbayInventorySDK\Models\BulkPriceQuantityResponse;
use SapientPro\EbayInventorySDK\Models\GetInventoryItem;
use SapientPro\EbayInventorySDK\Models\GetInventoryItemResponse;
use SapientPro\EbayInventorySDK\Models\InventoryItem;
use SapientPro\EbayInventorySDK\Models\InventoryItemResponse;
use SapientPro\EbayInventorySDK\Models\InventoryItems;
use SapientPro\EbayInventorySDK\Models\InventoryItemWithSkuLocale;
use SapientPro\EbayInventorySDK\Models\InventoryItemWithSkuLocaleGroupId;
use SapientPro\EbayInventorySDK\Models\InventoryItemWithSkuLocaleGroupKeys;
use SapientPro\EbayInventorySDK\Models\OfferPriceQuantity;
use SapientPro\EbayInventorySDK\Models\PriceQuantity;
use SapientPro\EbayInventorySDK\Models\PriceQuantityResponse;
use SapientPro\EbayInventorySDK\Models\Product;
use SapientPro\EbayInventorySDK\Models\ShipToLocationAvailability;
use SapientPro\EbayInventorySDK\Models\ShipToLocationAvailabilityWithAll;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InventoryItemApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testBulkCreateOrReplaceInventoryItem()
    {
        $requestBody = BulkInventoryItem::fromArray([
            'requests' => [
                InventoryItemWithSkuLocale::fromArray([
                    'sku' => 'B********s',
                    'locale' => LocaleEnum::en_US,
                    'product' => Product::fromArray([
                        'title' => 'Boston Terriers Collector Plate &quot;All Ears by Dan Hatala - The Danbury Mint',
                        'aspects' => [
                            "Country/Region of Manufacture" => [
                                "United States"
                            ]
                        ],
                        'description' => 'All Ears by Dan Hatala. A limited edition from the collection entitled \'Boston Terriers\'. Presented by The Danbury Mint.',
                        'imageUrls' => [
                            'https://i*****g.com/0**********/**********F'
                        ]
                    ]),
                    'condition' => ConditionEnum::USED_EXCELLENT,
                    'conditionDescription' => 'Mint condition. Kept in styrofoam case. Never displayed.',
                    'availability' => Availability::fromArray([
                        'shipToLocationAvailability' => ShipToLocationAvailability::fromArray([
                            'quantity' => 2
                        ])
                    ])
                ]),
                [
                    'sku' => 'J********h',
                    'locale' => LocaleEnum::en_US,
                    'product' => Product::fromArray([
                        'title' => 'JOE PAVELSKI 2015-16 BOBBLEHEAD NHL SAN JOSE SHARKS 25TH ANNIVERSARY',
                        'aspects' => [
                            "Team" => [
                                "San Jose Sharks"
                            ],
                            "Player" => [
                                "Joe Pavelski"
                            ],
                            "Pre & Post Season" => [
                                "Regular Season"
                            ],
                            "Product" => [
                                "Bobblehead"
                            ],
                            "Country/Region of Manufacture" => [
                                "China"
                            ],
                            "Brand" => [
                                "Success Promotions"
                            ],
                            "UPC" => [
                                "Does not apply"
                            ]
                        ],
                        'description' => 'Joe Pavelski bobble head from 2015-16 season, the 25th season of the San Jose Sharks. New in box.',
                        'imageUrls' => [
                            'https://i*****g.com/0**********/**********F'
                        ]
                    ]),
                    'condition' => ConditionEnum::NEW,
                    'availability' => Availability::fromArray([
                        'shipToLocationAvailability' => ShipToLocationAvailability::fromArray([
                            'quantity' => 1
                        ])
                    ])
                ]
            ]
        ]);

        $mockResponse = <<<JSON
{
    "responses": [
        {
            "statusCode": 201,
            "sku": "B********s",
            "locale": "en_US",
            "warnings": [],
            "errors": []
        },
        {
            "statusCode": 201,
            "sku": "J********h",
            "locale": "en_US",
            "warnings": [],
            "errors": []
        }
    ]
}
JSON;

        $expectedResponse = BulkInventoryItemResponse::fromArray([
            'responses' => [
                InventoryItemResponse::fromArray([
                    'statusCode' => 201,
                    'sku' => 'B********s',
                    'locale' => LocaleEnum::en_US,
                    'warnings' => [],
                    'errors' => []
                ]),
                InventoryItemResponse::fromArray([
                    'statusCode' => 201,
                    'sku' => 'J********h',
                    'locale' => LocaleEnum::en_US,
                    'warnings' => [],
                    'errors' => []
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(InventoryItemApi::class, $client);

        $result = $api->bulkCreateOrReplaceInventoryItem($requestBody, LocaleEnum::en_US);

        $this->assertEquals($expectedResponse, $result);
    }

    public function testBulkGetInventoryItem()
    {
        $requestBody = BulkGetInventoryItem::fromArray([
            'requests' => [
                GetInventoryItem::fromArray([
                    'sku' => 'B********s',
                ]),
                [
                    'sku' => 'J********h',
                ]
            ]
        ]);

        $mockResponse = <<<JSON
{
    "responses": [
        {
            "statusCode": 200,
            "sku": "B********s",
            "inventoryItem": {
                "product": {
                    "title": "Boston Terriers Collector Plate &quot;All Ears&quot; by Dan Hatala - The Danbury Mint",
                    "aspects": {
                        "Country/Region of Manufacture": [
                            "United States"
                        ]
                    },
                    "description": "All Ears by Dan Hatala. A limited edition from the collection entitled 'Boston Terriers'. Presented by The Danbury Mint.",
                    "imageUrls": [
                        "https://i*****g.com/0**********/**********F"
                    ]
                },
                "condition": "USED_EXCELLENT",
                "conditionDescription": "Mint condition. Kept in styrofoam case. Never displayed.",
                "availability": {
                    "shipToLocationAvailability": {
                        "quantity": 2
                    }
                }
            }
        },
        {
            "statusCode": 200,
            "sku": "J********h",
            "inventoryItem": {
                "product": {
                    "title": "JOE PAVELSKI 2015-16 BOBBLEHEAD NHL SAN JOSE SHARKS 25TH ANNIVERSARY",
                    "aspects": {
                        "Team": [
                            "San Jose Sharks"
                        ],
                        "Player": [
                            "Joe Pavelski"
                        ],
                        "Pre & Post Season": [
                            "Regular Season"
                        ],
                        "Product": [
                            "Bobblehead"
                        ],
                        "Country/Region of Manufacture": [
                            "China"
                        ],
                        "Brand": [
                            "Success Promotions"
                        ],
                        "UPC": [
                            "Does not apply"
                        ]
                    },
                    "description": "Joe Pavelski bobble head from 2015-16 season, the 25th season of the San Jose Sharks. New in box.",
                    "imageUrls": [
                        "https://i*****g.com/0**********/**********F"
                    ]
                },
                "condition": "NEW",
                "availability": {
                    "shipToLocationAvailability": {
                        "quantity": 1
                    }
                }
            }
        }
    ]
}
JSON;

        $expectedResponse = BulkGetInventoryItemResponse::fromArray([
            'responses' => [
                GetInventoryItemResponse::fromArray([
                    'statusCode' => 200,
                    'sku' => 'B********s',
                    'inventoryItem' => InventoryItemWithSkuLocaleGroupKeys::fromArray([
                        'product' => Product::fromArray([
                            'title' => 'Boston Terriers Collector Plate &quot;All Ears&quot; by Dan Hatala - The Danbury Mint',
                            'aspects' => [
                                "Country/Region of Manufacture" => [
                                    "United States"
                                ]
                            ],
                            'description' => 'All Ears by Dan Hatala. A limited edition from the collection entitled \'Boston Terriers\'. Presented by The Danbury Mint.',
                            'imageUrls' => [
                                'https://i*****g.com/0**********/**********F'
                            ]
                        ]),
                        'condition' => ConditionEnum::USED_EXCELLENT,
                        'conditionDescription' => 'Mint condition. Kept in styrofoam case. Never displayed.',
                        'availability' => AvailabilityWithAll::fromArray([
                            'shipToLocationAvailability' => ShipToLocationAvailabilityWithAll::fromArray([
                                'quantity' => 2
                            ])
                        ])
                    ])
                ]),
                GetInventoryItemResponse::fromArray([
                    'statusCode' => 200,
                    'sku' => 'J********h',
                    'inventoryItem' => InventoryItemWithSkuLocaleGroupKeys::fromArray([
                        'product' => Product::fromArray([
                            'title' => 'JOE PAVELSKI 2015-16 BOBBLEHEAD NHL SAN JOSE SHARKS 25TH ANNIVERSARY',
                            'aspects' => [
                                "Team" => [
                                    "San Jose Sharks"
                                ],
                                "Player" => [
                                    "Joe Pavelski"
                                ],
                                "Pre & Post Season" => [
                                    "Regular Season"
                                ],
                                "Product" => [
                                    "Bobblehead"
                                ],
                                "Country/Region of Manufacture" => [
                                    "China"
                                ],
                                "Brand" => [
                                    "Success Promotions"
                                ],
                                "UPC" => [
                                    "Does not apply"
                                ]
                            ],
                            'description' => 'Joe Pavelski bobble head from 2015-16 season, the 25th season of the San Jose Sharks. New in box.',
                            'imageUrls' => [
                                'https://i*****g.com/0**********/**********F'
                            ]
                        ]),
                        'condition' => ConditionEnum::NEW,
                        'availability' => AvailabilityWithAll::fromArray([
                            'shipToLocationAvailability' => ShipToLocationAvailabilityWithAll::fromArray([
                                'quantity' => 1
                            ])
                        ])
                    ])
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponse);
        $api = $this->createApi(InventoryItemApi::class, $client);

        $result = $api->bulkGetInventoryItem($requestBody);

        $this->assertEquals($expectedResponse, $result);
    }

    public function testBulkUpdatePriceQuantity()
    {
        $requestBody = BulkPriceQuantity::fromArray([
            'requests' => [
                PriceQuantity::fromArray([
                    'offers' => [
                        OfferPriceQuantity::fromArray([
                            'availableQuantity' => 30,
                            'offerId' => '3********5',
                            'price' => Amount::fromArray([
                                'currency' => CurrencyCodeEnum::USD->value,
                                'value' => '299.0'
                            ])
                        ]),
                        OfferPriceQuantity::fromArray([
                            'availableQuantity' => 20,
                            'offerId' => '3********2',
                            'price' => Amount::fromArray([
                                'currency' => CurrencyCodeEnum::GBP->value,
                                'value' => '232.0'
                            ])
                        ]),
                    ],
                    'shipToLocationAvailability' => ShipToLocationAvailability::fromArray([
                        'quantity' => 50
                    ]),
                    'sku' => 'G********1'
                ]),
                PriceQuantity::fromArray([
                    'offers' => [
                        OfferPriceQuantity::fromArray([
                            'availableQuantity' => 15,
                            'offerId' => '3********3',
                            'price' => Amount::fromArray([
                                'currency' => CurrencyCodeEnum::USD->value,
                                'value' => '249.0'
                            ])
                        ]),
                        OfferPriceQuantity::fromArray([
                            'availableQuantity' => 10,
                            'offerId' => '3********4',
                            'price' => Amount::fromArray([
                                'currency' => CurrencyCodeEnum::GBP->value,
                                'value' => '182.0'
                            ])
                        ]),
                    ],
                    'shipToLocationAvailability' => ShipToLocationAvailability::fromArray([
                        'quantity' => 25
                    ]),
                    'sku' => 'G********2'
                ])
            ]
        ]);

        $mockResponseBody = <<<JSON
{
    "responses": [
        {
            "offerId": "3********1",
            "sku": "G********1",
            "statusCode": 200
        },
        {
            "offerId": "3********2",
            "sku": "G********1",
            "statusCode": 200
        },
        {
            "offerId": "3********3",
            "sku": "G********2",
            "statusCode": 200
        },
        {
            "offerId": "3********4",
            "sku": "G********2",
            "statusCode": 200
        }
    ]
}
JSON;

        $expectedResponse = BulkPriceQuantityResponse::fromArray([
            'responses' => [
                PriceQuantityResponse::fromArray([
                    'offerId' => '3********1',
                    'sku' => 'G********1',
                    'statusCode' => 200
                ]),
                PriceQuantityResponse::fromArray([
                    'offerId' => '3********2',
                    'sku' => 'G********1',
                    'statusCode' => 200
                ]),
                PriceQuantityResponse::fromArray([
                    'offerId' => '3********3',
                    'sku' => 'G********2',
                    'statusCode' => 200
                ]),
                PriceQuantityResponse::fromArray([
                    'offerId' => '3********4',
                    'sku' => 'G********2',
                    'statusCode' => 200
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);

        $api = $this->createApi(InventoryItemApi::class, $client);

        $result = $api->bulkUpdatePriceQuantity($requestBody);

        $this->assertEquals($expectedResponse, $result);
    }

    public function testCreateOrReplaceInventoryItem()
    {
        $requestBody = InventoryItem::fromArray([
            'availability' => Availability::fromArray([
                'shipToLocationAvailability' => ShipToLocationAvailability::fromArray([
                    'quantity' => 50
                ])
            ]),
            'condition' => ConditionEnum::NEW,
            'product' => Product::fromArray([
                'title' => 'GoPro Hero4 Helmet Cam',
                'description' => 'New GoPro Hero4 Helmet Cam. Unopened box.',
                'aspects' => [
                    'Brand' => [
                        'GoPro'
                    ],
                    'Type' => [
                        'Helmet/Action'
                    ],
                    'Storage Type' => [
                        'Removable'
                    ],
                    'Recording Definition' => [
                        'High Definition'
                    ],
                    'Media Format' => [
                        'Flash Drive (SSD)'
                    ],
                    'Optical Zoom' => [
                        '10x'
                    ]
                ],
                'brand' => 'GoPro',
                'mpn' => 'CHDHX-401',
                'imageUrls' => [
                    'https://i*****g.com/0**********/**********1.jpg',
                    'https://i*****g.com/0**********/**********2.jpg',
                    'https://i*****g.com/0**********/**********3.jpg'
                ]
            ])
        ]);

        $client = $this->prepareClientMock(204);
        $api = $this->createApi(InventoryItemApi::class, $client);

        $result = $api->createOrReplaceInventoryItemWithHttpInfo(
            $requestBody,
            LocaleEnum::en_US,
            'SKU123'
        );

        $this->assertEquals(204, $result['code']);
    }

    public function testDeleteInventoryItem()
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(InventoryItemApi::class, $client);

        $result = $api->deleteInventoryItemWithHttpInfo('SKU123');

        $this->assertEquals(204, $result['code']);
    }

    public function testGetInventoryItem()
    {
        $mockResponseBody = <<<JSON
{
    "sku": "G********1",
    "availability": {
        "shipToLocationAvailability": {
            "quantity": 50
        }
    },
    "condition": "NEW",
    "product": {
        "title": "GoPro Hero4 Helmet Cam",
        "description": "New GoPro Hero4 Helmet Cam. Unopened box.",
        "aspects": {
            "Brand": [
                "GoPro"
            ],
            "Type": [
                "Helmet/Action"
            ],
            "Storage Type": [
                "Removable"
            ],
            "Recording Definition": [
                "High Definition"
            ],
            "Media Format": [
                "Flash Drive (SSD)"
            ],
            "Optical Zoom": [
                "10x"
            ]
        },
        "imageUrls": [
            "https://i*****g.com/0**********/**********1.jpg",
            "https://i*****g.com/0**********/**********2.jpg",
            "https://i*****g.com/0**********/**********3.jpg"
        ]
    }
}
JSON;

        $expectedResponse = InventoryItemWithSkuLocaleGroupId::fromArray([
            'sku' => 'G********1',
            'availability' => AvailabilityWithAll::fromArray([
                'shipToLocationAvailability' => ShipToLocationAvailabilityWithAll::fromArray([
                    'quantity' => 50
                ])
            ]),
            'condition' => ConditionEnum::NEW,
            'product' => Product::fromArray([
                'title' => 'GoPro Hero4 Helmet Cam',
                'description' => 'New GoPro Hero4 Helmet Cam. Unopened box.',
                'aspects' => [
                    'Brand' => [
                        'GoPro'
                    ],
                    'Type' => [
                        'Helmet/Action'
                    ],
                    'Storage Type' => [
                        'Removable'
                    ],
                    'Recording Definition' => [
                        'High Definition'
                    ],
                    'Media Format' => [
                        'Flash Drive (SSD)'
                    ],
                    'Optical Zoom' => [
                        '10x'
                    ]
                ],
                'imageUrls' => [
                    'https://i*****g.com/0**********/**********1.jpg',
                    'https://i*****g.com/0**********/**********2.jpg',
                    'https://i*****g.com/0**********/**********3.jpg'
                ]
            ])
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(InventoryItemApi::class, $client);

        $result = $api->getInventoryItem('SKU123');

        $this->assertEquals($expectedResponse, $result);
    }

    public function testGetInventoryItems()
    {
        $mockResponseBody = <<<JSON
{
    "href": "/?offset=0&limit=2",
    "limit": 2,
    "inventoryItems": [
        {
            "sku": "G********1",
            "availability": {
                "shipToLocationAvailability": {
                    "quantity": 50
                }
            },
            "condition": "NEW",
            "product": {
                "title": "GoPro Hero4 Helmet Cam",
                "description": "New GoPro Hero4 Helmet Cam. Unopened box.",
                "aspects": {
                    "Brand": [
                        "GoPro"
                    ],
                    "Type": [
                        "Helmet/Action"
                    ],
                    "Storage Type": [
                        "Removable"
                    ],
                    "Recording Definition": [
                        "High Definition"
                    ],
                    "Media Format": [
                        "Flash Drive (SSD)"
                    ],
                    "Optical Zoom": [
                        "10x"
                    ]
                },
                "imageUrls": [
                    "https://i*****g.com/*****/**********/**********0.jpg",
                    "https://i*****g.com/*****/**********/**********1.jpg",
                    "https://i*****g.com/*****/**********/**********2.jpg"
                ]
            }
        },
        {
            "sku": "G********2",
            "availability": {
                "shipToLocationAvailability": {
                    "quantity": 50
                }
            },
            "condition": "NEW",
            "product": {
                "title": "GoPro Hero3 Helmet Cam",
                "description": "New GoPro Hero3 Helmet Cam. Unopened box.",
                "aspects": {
                    "Brand": [
                        "GoPro"
                    ],
                    "Type": [
                        "Helmet/Action"
                    ],
                    "Storage Type": [
                        "Removable"
                    ],
                    "Recording Definition": [
                        "High Definition"
                    ],
                    "Media Format": [
                        "Flash Drive (SSD)"
                    ],
                    "Optical Zoom": [
                        "5x"
                    ]
                },
                "imageUrls": [
                    "https://i*****g.com/*****/**********/**********3.jpg",
                    "https://i*****g.com/*****/**********/**********4.jpg",
                    "https://i*****g.com/*****/**********/**********5.jpg"
                ]
            }
        }
    ],
    "next": "/?offset=2&limit=2",
    "size": 50,
    "total": 100
}
JSON;

        $expectedResponse = InventoryItems::fromArray([
            'href' => '/?offset=0&limit=2',
            'limit' => 2,
            'inventoryItems' => [
                InventoryItemWithSkuLocaleGroupId::fromArray([
                    'sku' => 'G********1',
                    'availability' => AvailabilityWithAll::fromArray([
                        'shipToLocationAvailability' => ShipToLocationAvailabilityWithAll::fromArray([
                            'quantity' => 50
                        ])
                    ]),
                    'condition' => ConditionEnum::NEW,
                    'product' => Product::fromArray([
                        'title' => 'GoPro Hero4 Helmet Cam',
                        'description' => 'New GoPro Hero4 Helmet Cam. Unopened box.',
                        'aspects' => [
                            'Brand' => [
                                'GoPro'
                            ],
                            'Type' => [
                                'Helmet/Action'
                            ],
                            'Storage Type' => [
                                'Removable'
                            ],
                            'Recording Definition' => [
                                'High Definition'
                            ],
                            'Media Format' => [
                                'Flash Drive (SSD)'
                            ],
                            'Optical Zoom' => [
                                '10x'
                            ]
                        ],
                        'imageUrls' => [
                            'https://i*****g.com/*****/**********/**********0.jpg',
                            'https://i*****g.com/*****/**********/**********1.jpg',
                            'https://i*****g.com/*****/**********/**********2.jpg'
                        ]
                    ])
                ]),
                InventoryItemWithSkuLocaleGroupId::fromArray([
                    'sku' => 'G********2',
                    'availability' => AvailabilityWithAll::fromArray([
                        'shipToLocationAvailability' => ShipToLocationAvailabilityWithAll::fromArray([
                            'quantity' => 50
                        ])
                    ]),
                    'condition' => ConditionEnum::NEW,
                    'product' => Product::fromArray([
                        'title' => 'GoPro Hero3 Helmet Cam',
                        'description' => 'New GoPro Hero3 Helmet Cam. Unopened box.',
                        'aspects' => [
                            'Brand' => [
                                'GoPro'
                            ],
                            'Type' => [
                                'Helmet/Action'
                            ],
                            'Storage Type' => [
                                'Removable'
                            ],
                            'Recording Definition' => [
                                'High Definition'
                            ],
                            'Media Format' => [
                                'Flash Drive (SSD)'
                            ],
                            'Optical Zoom' => [
                                '5x'
                            ]
                        ],
                        'imageUrls' => [
                            'https://i*****g.com/*****/**********/**********3.jpg',
                            'https://i*****g.com/*****/**********/**********4.jpg',
                            'https://i*****g.com/*****/**********/**********5.jpg'
                        ]
                    ])
                ])
            ],
            'next' => '/?offset=2&limit=2',
            'size' => 50,
            'total' => 100
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(InventoryItemApi::class, $client);

        $result = $api->getInventoryItems(2);

        $this->assertEquals($expectedResponse, $result);
    }
}
