# SapientPro\EbayInventorySDK\Api\ProductCompatibilityApi

All URIs are relative to *https://api.ebay.com/sell/inventory/v1*

| Method                                                                                                    | HTTP request                                           | Description |
|-----------------------------------------------------------------------------------------------------------|--------------------------------------------------------|-------------|
| [**createOrReplaceProductCompatibility**](ProductCompatibilityApi.md#createorreplaceproductcompatibility) | **PUT** /inventory_item/{sku}/product_compatibility    |             |
| [**deleteProductCompatibility**](ProductCompatibilityApi.md#deleteproductcompatibility)                   | **DELETE** /inventory_item/{sku}/product_compatibility |             |
| [**getProductCompatibility**](ProductCompatibilityApi.md#getproductcompatibility)                         | **GET** /inventory_item/{sku}/product_compatibility    |             |

# **createOrReplaceProductCompatibility**
> SapientPro\EbayInventorySDK\Models\BaseResponse createOrReplaceProductCompatibility($body, $contentLanguage, $sku)

This call is used by the seller to create or replace a list of products that are compatible with the inventory item. The inventory item is identified with a SKU value in the URI. Product compatibility is currently only applicable to motor vehicle parts and accessory categories, but more categories may be supported in the future.<br /><br /><p>In addition to the <code>authorization</code> header, which is required for all eBay REST API calls, the <strong>createOrReplaceProductCompatibility</strong> call also requires the <code>Content-Language</code> header, that sets the natural language that will be used in the field values of the request payload. For US English, the code value passed in this header should be <code>en-US</code>. To view other supported <code>Content-Language</code> values, and to read more about all supported HTTP headers for eBay REST API calls, see the <a href=\"/api-docs/static/rest-request-components.html#HTTP\">HTTP request headers</a> topic in the <strong>Using eBay RESTful APIs</strong> document.</p>

### Example
```php
<?php
use SapientPro\EbayInventorySDK\Configuration;
use SapientPro\EbayInventorySDK\Api\ProductCompatibilityApi;
use SapientPro\EbayInventorySDK\Models\Compatibility;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new ProductCompatibilityApi(
    сonfig: $config
);
$body = Compatibility::fromArray([]); // SapientPro\EbayInventorySDK\Models\Compatibility | Details of the compatibility
$contentLanguage = "contentLanguage_example"; // string | This request header sets the natural language that will be provided in the field values of the request payload.
$sku = "sku_example"; // string | A SKU (stock keeping unit) is an unique identifier defined by a seller for a product

try {
    $result = $apiInstance->createOrReplaceProductCompatibility($body, $contentLanguage, $sku);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductCompatibilityApi->createOrReplaceProductCompatibility: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                | Type                                                                              | Description                                                                                                     | Notes |
|---------------------|-----------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------|-------|
| **body**            | [**SapientPro\EbayInventorySDK\Models\Compatibility**](../Model/Compatibility.md) | Details of the compatibility                                                                                    |       |
| **contentLanguage** | **\SapientPro\EbayInventorySDK\Enums\LocaleEnum**                                 | This request header sets the natural language that will be provided in the field values of the request payload. |       |
| **sku**             | **string**                                                                        | A SKU (stock keeping unit) is an unique identifier defined by a seller for a product                            |       |

### Return type

[**SapientPro\EbayInventorySDK\Models\BaseResponse**](../Model/BaseResponse.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteProductCompatibility**
> deleteProductCompatibility($sku)

This call is used by the seller to delete the list of products that are compatible with the inventory item that is associated with the compatible product list. The inventory item is identified with a SKU value in the URI. Product compatibility is currently only applicable to motor vehicle parts and accessory categories, but more categories may be supported in the future.

### Example
```php
<?php
use SapientPro\EbayInventorySDK\Configuration;
use SapientPro\EbayInventorySDK\Api\ProductCompatibilityApi;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new ProductCompatibilityApi(
    сonfig: $config
);
$sku = "sku_example"; // string | A SKU (stock keeping unit) is an unique identifier defined by a seller for a product

try {
    $apiInstance->deleteProductCompatibility($sku);
} catch (Exception $e) {
    echo 'Exception when calling ProductCompatibilityApi->deleteProductCompatibility: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name    | Type       | Description                                                                          | Notes |
|---------|------------|--------------------------------------------------------------------------------------|-------|
| **sku** | **string** | A SKU (stock keeping unit) is an unique identifier defined by a seller for a product |       |

### Return type

void (empty response body)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProductCompatibility**
> SapientPro\EbayInventorySDK\Models\Compatibility getProductCompatibility($sku)



This call is used by the seller to retrieve the list of products that are compatible with the inventory item. The SKU value for the inventory item is passed into the call URI, and a successful call with return the compatible vehicle list associated with this inventory item. Product compatibility is currently only applicable to motor vehicle parts and accessory categories, but more categories may be supported in the future.

### Example
```php
<?php
use SapientPro\EbayInventorySDK\Configuration;
use SapientPro\EbayInventorySDK\Api\ProductCompatibilityApi;
use SapientPro\EbayInventorySDK\Models\Compatibility;

// Configure OAuth2 access token for authorization: api_auth
$config = Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new ProductCompatibilityApi(
    сonfig: $config
);
$sku = "sku_example"; // string | A SKU (stock keeping unit) is an unique identifier defined by a seller for a product

try {
    $result = $apiInstance->getProductCompatibility($sku);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductCompatibilityApi->getProductCompatibility: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name    | Type       | Description                                                                          | Notes |
|---------|------------|--------------------------------------------------------------------------------------|-------|
| **sku** | **string** | A SKU (stock keeping unit) is an unique identifier defined by a seller for a product |       |

### Return type

[**SapientPro\EbayInventorySDK\Models\Compatibility**](../Model/Compatibility.md)

### Authorization

[api_auth](../../README.md#api_auth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

