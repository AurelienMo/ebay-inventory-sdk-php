<?php

namespace SapientPro\EbayInventorySDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayInventorySDK\Api\InventoryItemGroupApi;
use SapientPro\EbayInventorySDK\Enums\LocaleEnum;
use SapientPro\EbayInventorySDK\Models\InventoryItemGroup;
use SapientPro\EbayInventorySDK\Models\Specification;
use SapientPro\EbayInventorySDK\Models\VariesBy;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InventoryItemGroupApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testCreateOrReplaceInventoryItemGroup()
    {
        $requestBody = InventoryItemGroup::fromArray([
            'aspects' => [
                'pattern' => [
                    'solid'
                ],
                'sleeves' => [
                    'short'
                ]
            ],
            'title' => 'Men\'s Solid Polo Shirts',
            'description' => 'Men\'s solid polo shirts in five colors (Green, Blue, Red, Black, and White), and sizes ranges from small to XL.',
            'imageUrls' => [
                'https://i*****g.com/0**********/**********1.jpg'
            ],
            'variantSKUs' => [
                "M**S-GrS",
                "M**S-GrM",
                "M**S-GrL",
                "M**S-GrXL",
                "M**S-BlS",
                "M**S-BlM",
                "M**S-BlL",
                "M**S-BlXL",
                "M**S-RdS",
                "M**S-RdM",
                "M**S-RdL",
                "M**S-RdXL",
                "M**S-BkS",
                "M**S-BkM",
                "M**S-BkL",
                "M**S-BkXL",
                "M**S-WhS",
                "M**S-WhM",
                "M**S-WhL",
                "M**S-WhXL"
            ],
            'variesBy' => VariesBy::fromArray([
                'aspectsImageVariesBy' => [
                    'Color'
                ],
                'specifications' => [
                    Specification::fromArray([
                        'name' => 'Color',
                        'values' => [
                            'Green',
                            'Blue',
                            'Red',
                            'Black',
                            'White'
                        ]
                    ]),
                    Specification::fromArray([
                        'name' => 'Size',
                        'values' => [
                            'Small',
                            'Medium',
                            'Large',
                            'Extra-Large'
                        ]
                    ])
                ]
            ])
        ]);

        $client = $this->prepareClientMock(204);
        $api = $this->createApi(InventoryItemGroupApi::class, $client);

        $result = $api->createOrReplaceInventoryItemGroupWithHttpInfo(
            $requestBody,
            'en-US',
            'id1'
        );

        $this->assertEquals(204, $result['code']);
    }

    public function testDeleteInventoryItemGroup()
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(InventoryItemGroupApi::class, $client);

        $result = $api->deleteInventoryItemGroupWithHttpInfo(
            'id1'
        );

        $this->assertEquals(204, $result['code']);
    }

    public function testGetInventoryItemGroup()
    {
        $mockResponseBody = <<<JSON
{
    "inventoryItemGroupKey": "M********s",
    "aspects": {
        "pattern": [
            "solid"
        ],
        "sleeves": [
            "short"
        ]
    },
    "title": "Men's Solid Polo Shirts",
    "description": "Men's Solid Polo Shirts Shirts in five colors (Green, Blue, Red, Black, and White), and sizes ranges from small to XL.",
    "imageUrls": [
        "https://i*****g.com/0**********/**********1.jpg"
    ],
    "variantSKUs": [
        "M**S-GrS",
        "M**S-GrM",
        "M**S-GrL",
        "M**S-GrXL",
        "M**S-BlS",
        "M**S-BlM",
        "M**S-BlL",
        "M**S-BlXL",
        "M**S-RdS",
        "M**S-RdM",
        "M**S-RdL",
        "M**S-RdXL",
        "M**S-BkS",
        "M**S-BkM",
        "M**S-BkL",
        "M**S-BkXL",
        "M**S-WhS",
        "M**S-WhM",
        "M**S-WhL",
        "M**S-WhXL"
    ],
    "variesBy": {
        "aspectsImageVariesBy": [
            "Color"
        ],
        "specifications": [
            {
                "name": "Color",
                "values": [
                    "Green",
                    "Blue",
                    "Red",
                    "Black",
                    "White"
                ]
            },
            {
                "name": "Size",
                "values": [
                    "Small",
                    "Medium",
                    "Large",
                    "Extra-Large"
                ]
            }
        ]
    }
}
JSON;

        $expectedResponse = InventoryItemGroup::fromArray([
            'inventoryItemGroupKey' => 'M********s',
            'aspects' => [
                'pattern' => [
                    'solid'
                ],
                'sleeves' => [
                    'short'
                ]
            ],
            'title' => 'Men\'s Solid Polo Shirts',
            'description' => 'Men\'s Solid Polo Shirts Shirts in five colors (Green, Blue, Red, Black, and White), and sizes ranges from small to XL.',
            'imageUrls' => [
                'https://i*****g.com/0**********/**********1.jpg'
            ],
            'variantSKUs' => [
                "M**S-GrS",
                "M**S-GrM",
                "M**S-GrL",
                "M**S-GrXL",
                "M**S-BlS",
                "M**S-BlM",
                "M**S-BlL",
                "M**S-BlXL",
                "M**S-RdS",
                "M**S-RdM",
                "M**S-RdL",
                "M**S-RdXL",
                "M**S-BkS",
                "M**S-BkM",
                "M**S-BkL",
                "M**S-BkXL",
                "M**S-WhS",
                "M**S-WhM",
                "M**S-WhL",
                "M**S-WhXL"
            ],
            'variesBy' => VariesBy::fromArray([
                'aspectsImageVariesBy' => [
                    'Color'
                ],
                'specifications' => [
                    Specification::fromArray([
                        'name' => 'Color',
                        'values' => [
                            'Green',
                            'Blue',
                            'Red',
                            'Black',
                            'White'
                        ]
                    ]),
                    Specification::fromArray([
                        'name' => 'Size',
                        'values' => [
                            'Small',
                            'Medium',
                            'Large',
                            'Extra-Large'
                        ]
                    ])
                ]
            ])
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(InventoryItemGroupApi::class, $client);

        $result = $api->getInventoryItemGroupWithHttpInfo(
            'id1'
        );

        $this->assertEquals($expectedResponse, $result['data']);
    }
}
