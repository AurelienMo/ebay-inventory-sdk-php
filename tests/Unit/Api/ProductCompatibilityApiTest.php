<?php

namespace SapientPro\EbayInventorySDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayInventorySDK\Api\ProductCompatibilityApi;
use SapientPro\EbayInventorySDK\Enums\LocaleEnum;
use SapientPro\EbayInventorySDK\Models\Compatibility;
use SapientPro\EbayInventorySDK\Models\CompatibleProduct;
use SapientPro\EbayInventorySDK\Models\ProductFamilyProperties;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayInventorySDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProductCompatibilityApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testCreateOrReplaceProductCompatibility()
    {
        $requestBody = Compatibility::fromArray([
            'compatibleProducts' => [
                CompatibleProduct::fromArray([
                    'productFamilyProperties' => ProductFamilyProperties::fromArray([
                        'make' => 'Subaru',
                        'model' => 'DL',
                        'year' => '1982',
                        'trim' => 'Base Wagon 4-Door',
                        'engine' => '1.8L 1781CC H4 GAS SOHC Naturally Aspirated'
                    ]),
                    'notes' => 'Equivalent to AC Delco Alternator'
                ]),
                CompatibleProduct::fromArray([
                    'productFamilyProperties' => ProductFamilyProperties::fromArray([
                        'make' => 'Subaru',
                        'model' => 'GL',
                        'year' => '1983',
                        'trim' => 'Base Wagon 4-Door',
                        'engine' => '1.8L 1781CC H4 GAS OHV Turbocharged'
                    ]),
                    'notes' => 'Equivalent to AC Delco Alternator'
                ]),
                CompatibleProduct::fromArray([
                    'productFamilyProperties' => ProductFamilyProperties::fromArray([
                        'make' => 'Subaru',
                        'model' => 'DL',
                        'year' => '1985',
                        'trim' => 'Base Wagon 4-Door',
                        'engine' => '1.8L 1781CC H4 GAS SOHC Naturally Aspirated'
                    ]),
                    'notes' => 'Equivalent to AC Delco Alternator'
                ]),
                CompatibleProduct::fromArray([
                    'productFamilyProperties' => ProductFamilyProperties::fromArray([
                        'make' => 'Subaru',
                        'model' => 'GL',
                        'year' => '1986',
                        'trim' => 'Base Wagon 4-Door',
                        'engine' => '1.8L 1781CC H4 GAS OHV Naturally Aspirated'
                    ]),
                    'notes' => 'Equivalent to AC Delco Alternator'
                ])
            ]
        ]);

        $client = $this->prepareClientMock(200);
        $api = $this->createApi(ProductCompatibilityApi::class, $client);

        $result = $api->createOrReplaceProductCompatibilityWithHttpInfo($requestBody, LocaleEnum::en_US, '1234567890');

        $this->assertEquals(200, $result['code']);
    }

    public function testDeleteProductCompatibility()
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(ProductCompatibilityApi::class, $client);

        $result = $api->deleteProductCompatibilityWithHttpInfo('1234567890');

        $this->assertEquals(204, $result['code']);
    }

    public function testGetProductCompatibility()
    {
        $mockResponseBody = <<<JSON
{
    "compatibleProducts": [
        {
            "productFamilyProperties": {
                "make": "Subaru",
                "model": "DL",
                "year": "1982",
                "trim": "Base Wagon 4-Door",
                "engine": "1.8L 1781CC H4 GAS SOHC Naturally Aspirated"
            },
            "notes": "Equivalent to AC Delco Alternator"
        },
        {
            "productFamilyProperties": {
                "make": "Subaru",
                "model": "GL",
                "year": "1983",
                "trim": "Base Wagon 4-Door",
                "engine": "1.8L 1781CC H4 GAS OHV Turbocharged"
            },
            "notes": "Equivalent to AC Delco Alternator"
        },
        {
            "productFamilyProperties": {
                "make": "Subaru",
                "model": "DL",
                "year": "1985",
                "trim": "Base Wagon 4-Door",
                "engine": "1.8L 1781CC H4 GAS SOHC Naturally Aspirated"
            },
            "notes": "Equivalent to AC Delco Alternator"
        },
        {
            "productFamilyProperties": {
                "make": "Subaru",
                "model": "GL",
                "year": "1986",
                "trim": "Base Wagon 4-Door",
                "engine": "1.8L 1781CC H4 GAS OHV Naturally Aspirated"
            },
            "notes": "Equivalent to AC Delco Alternator"
        }
    ],
    "sku": "A*****0"
}
JSON;

        $expectedResponse = Compatibility::fromArray([
            'compatibleProducts' => [
                CompatibleProduct::fromArray([
                    'productFamilyProperties' => ProductFamilyProperties::fromArray([
                        'make' => 'Subaru',
                        'model' => 'DL',
                        'year' => '1982',
                        'trim' => 'Base Wagon 4-Door',
                        'engine' => '1.8L 1781CC H4 GAS SOHC Naturally Aspirated'
                    ]),
                    'notes' => 'Equivalent to AC Delco Alternator'
                ]),
                CompatibleProduct::fromArray([
                    'productFamilyProperties' => ProductFamilyProperties::fromArray([
                        'make' => 'Subaru',
                        'model' => 'GL',
                        'year' => '1983',
                        'trim' => 'Base Wagon 4-Door',
                        'engine' => '1.8L 1781CC H4 GAS OHV Turbocharged'
                    ]),
                    'notes' => 'Equivalent to AC Delco Alternator'
                ]),
                CompatibleProduct::fromArray([
                    'productFamilyProperties' => ProductFamilyProperties::fromArray([
                        'make' => 'Subaru',
                        'model' => 'DL',
                        'year' => '1985',
                        'trim' => 'Base Wagon 4-Door',
                        'engine' => '1.8L 1781CC H4 GAS SOHC Naturally Aspirated'
                    ]),
                    'notes' => 'Equivalent to AC Delco Alternator'
                ]),
                CompatibleProduct::fromArray([
                    'productFamilyProperties' => ProductFamilyProperties::fromArray([
                        'make' => 'Subaru',
                        'model' => 'GL',
                        'year' => '1986',
                        'trim' => 'Base Wagon 4-Door',
                        'engine' => '1.8L 1781CC H4 GAS OHV Naturally Aspirated'
                    ]),
                    'notes' => 'Equivalent to AC Delco Alternator'
                ])
            ],
            "sku" => "A*****0"
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(ProductCompatibilityApi::class, $client);

        $result = $api->getProductCompatibility("A*****0");

        $this->assertEquals($expectedResponse, $result);
    }
}
