<?php

namespace SapientPro\EbayInventorySDK\Api;

use SapientPro\EbayInventorySDK\Client\EbayClient;
use SapientPro\EbayInventorySDK\Client\EbayRequest;
use SapientPro\EbayInventorySDK\Client\Serializer;
use SapientPro\EbayInventorySDK\ApiException;
use SapientPro\EbayInventorySDK\Configuration;
use SapientPro\EbayInventorySDK\Enums\LocaleEnum;
use SapientPro\EbayInventorySDK\HeaderSelector;
use SapientPro\EbayInventorySDK\Models\BaseResponse;
use SapientPro\EbayInventorySDK\Models\BulkGetInventoryItem;
use SapientPro\EbayInventorySDK\Models\BulkGetInventoryItemResponse;
use SapientPro\EbayInventorySDK\Models\BulkInventoryItem;
use SapientPro\EbayInventorySDK\Models\BulkInventoryItemResponse;
use SapientPro\EbayInventorySDK\Models\BulkPriceQuantity;
use SapientPro\EbayInventorySDK\Models\BulkPriceQuantityResponse;
use SapientPro\EbayInventorySDK\Models\InventoryItem;
use SapientPro\EbayInventorySDK\Models\InventoryItems;
use SapientPro\EbayInventorySDK\Models\InventoryItemWithSkuLocaleGroupId;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InventoryItemApi implements ApiInterface
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
     * Operation bulkCreateOrReplaceInventoryItem
     *
     * @param  BulkInventoryItem  $body  Details of the inventories with sku and locale (required)
     * @param  string  $contentLanguage
     * @return BulkInventoryItemResponse|null
     * @throws ApiException on non-2xx response
     */
    public function bulkCreateOrReplaceInventoryItem(
        BulkInventoryItem $body,
        string $contentLanguage
    ): ?BulkInventoryItemResponse {
        $response = $this->bulkCreateOrReplaceInventoryItemWithHttpInfo($body, $contentLanguage);

        return $response['data'] ?? null;
    }

    /**
     * Operation bulkCreateOrReplaceInventoryItemWithHttpInfo
     *
     * @param  BulkInventoryItem  $body  Details of the inventories with sku and locale (required)
     *
     * @return array of BulkInventoryItemResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function bulkCreateOrReplaceInventoryItemWithHttpInfo(
        BulkInventoryItem $body,
        string $contentLanguage
    ): array {
        $request = $this->bulkCreateOrReplaceInventoryItemRequest($body, $contentLanguage);

        return $this->ebayClient->sendRequest($request, returnType: BulkInventoryItemResponse::class);
    }

    /**
     * Create request for operation 'bulkCreateOrReplaceInventoryItem'
     *
     * @param  BulkInventoryItem  $body  Details of the inventories with sku and locale (required)
     * @param  string  $contentLanguage
     * @return Request
     */
    protected function bulkCreateOrReplaceInventoryItemRequest(
        BulkInventoryItem $body,
        string $contentLanguage
    ): Request {
        $resourcePath = '/bulk_create_or_replace_inventory_item';

        return $this->ebayRequest->postRequest(
            $resourcePath,
            $body,
            headerParameters: ['Content-Language' => $contentLanguage],
        );
    }

    /**
     * Operation bulkGetInventoryItem
     *
     * @param  BulkGetInventoryItem  $body  Details of the inventories with sku and locale (required)
     *
     * @return BulkGetInventoryItemResponse|null
     * @throws ApiException on non-2xx response
     */
    public function bulkGetInventoryItem(BulkGetInventoryItem $body): ?BulkGetInventoryItemResponse
    {
        $response = $this->bulkGetInventoryItemWithHttpInfo($body);

        return $response['data'] ?? null;
    }

    /**
     * Operation bulkGetInventoryItemWithHttpInfo
     *
     * @param  BulkGetInventoryItem  $body  Details of the inventories with sku and locale (required)
     *
     * @return array of BulkGetInventoryItemResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function bulkGetInventoryItemWithHttpInfo(BulkGetInventoryItem $body): array
    {
        $request = $this->bulkGetInventoryItemRequest($body);

        return $this->ebayClient->sendRequest($request, returnType: BulkGetInventoryItemResponse::class);
    }

    /**
     * Create request for operation 'bulkGetInventoryItem'
     *
     * @param  BulkGetInventoryItem  $body  Details of the inventories with sku and locale (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function bulkGetInventoryItemRequest(BulkGetInventoryItem $body): Request
    {
        $resourcePath = '/bulk_get_inventory_item';

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }

    /**
     * Operation bulkUpdatePriceQuantity
     *
     * @param  BulkPriceQuantity  $body  Price and allocation details for the given SKU and Marketplace (required)
     *
     * @return BulkPriceQuantityResponse|null
     * @throws ApiException on non-2xx response
     */
    public function bulkUpdatePriceQuantity(BulkPriceQuantity $body): ?BulkPriceQuantityResponse
    {
        $response = $this->bulkUpdatePriceQuantityWithHttpInfo($body);

        return $response['data'] ?? null;
    }

    /**
     * Operation bulkUpdatePriceQuantityWithHttpInfo
     *
     * @param  BulkPriceQuantity  $body  Price and allocation details for the given SKU and Marketplace (required)
     *
     * @return array of BulkPriceQuantityResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function bulkUpdatePriceQuantityWithHttpInfo(BulkPriceQuantity $body): array
    {
        $request = $this->bulkUpdatePriceQuantityRequest($body);

        return $this->ebayClient->sendRequest($request, returnType: BulkPriceQuantityResponse::class);
    }

    /**
     * Create request for operation 'bulkUpdatePriceQuantity'
     *
     * @param  BulkPriceQuantity  $body  Price and allocation details for the given SKU and Marketplace (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function bulkUpdatePriceQuantityRequest(BulkPriceQuantity $body): Request
    {
        $resourcePath = '/bulk_update_price_quantity';

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }

    /**
     * Operation createOrReplaceInventoryItem
     *
     * @param  InventoryItem  $body  Details of the inventory item record. (required)
     * @param  string  $contentLanguage
     *  This request header sets the natural language that will be provided in the field values
     * of the request payload. (required)
     * @param  string  $sku
     *  The seller-defined SKU value for the inventory item is required whether the seller
     *  is creating a new inventory item, or updating an existing inventory item.
     *  This SKU value is passed in at the end of the call URI.
     *  SKU values must be unique across the seller&#x27;s inventory.
     *  Max length: 50. (required)
     *
     * @return BaseResponse
     * @throws ApiException on non-2xx response
     */
    public function createOrReplaceInventoryItem(
        InventoryItem $body,
        string $contentLanguage,
        string $sku
    ): ?BaseResponse {
        $response = $this->createOrReplaceInventoryItemWithHttpInfo($body, $contentLanguage, $sku);

        return $response['data'] ?? null;
    }

    /**
     * Operation createOrReplaceInventoryItemWithHttpInfo
     *
     * @param  InventoryItem  $body  Details of the inventory item record. (required)
     * @param  string  $contentLanguage
     *  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $sku
     *  The seller-defined SKU value for the inventory item is required whether the seller is creating a new inventory item, or updating an existing inventory item. This SKU value is passed in at the end of the call URI. SKU values must be unique across the seller&#x27;s inventory. &lt;br/&gt;&lt;br/&gt; &lt;strong&gt;Max length&lt;/strong&gt;: 50. (required)
     *
     * @return array of BaseResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function createOrReplaceInventoryItemWithHttpInfo(
        InventoryItem $body,
        string $contentLanguage,
        string $sku
    ): array {
        $request = $this->createOrReplaceInventoryItemRequest($body, $contentLanguage, $sku);

        return $this->ebayClient->sendRequest($request, returnType: BaseResponse::class);
    }

    /**
     * Create request for operation 'createOrReplaceInventoryItem'
     *
     * @param  InventoryItem  $body  Details of the inventory item record. (required)
     * @param  string  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $sku  The seller-defined SKU value for the inventory item is required whether the seller is creating a new inventory item, or updating an existing inventory item. This SKU value is passed in at the end of the call URI. SKU values must be unique across the seller&#x27;s inventory. &lt;br/&gt;&lt;br/&gt; &lt;strong&gt;Max length&lt;/strong&gt;: 50. (required)
     *
     * @return Request
     */
    protected function createOrReplaceInventoryItemRequest(
        InventoryItem $body,
        string $contentLanguage,
        string $sku
    ): Request {
        $resourcePath = '/inventory_item/{sku}';
        $resourcePath = str_replace(
            '{' . 'sku' . '}',
            Serializer::toPathValue($sku),
            $resourcePath
        );

        return $this->ebayRequest->putRequest(
            $resourcePath,
            $body,
            headerParameters: ['Content-Language' => $contentLanguage],
        );
    }

    /**
     * Operation deleteInventoryItem
     *
     * @param  string  $sku  This is the seller-defined SKU value of the product whose inventory item record you wish to delete.&lt;br/&gt;&lt;br/&gt;&lt;strong&gt;Max length&lt;/strong&gt;: 50. (required)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteInventoryItem(string $sku): void
    {
        $this->deleteInventoryItemWithHttpInfo($sku);
    }

    /**
     * Operation deleteInventoryItemWithHttpInfo
     *
     * @param  string  $sku  This is the seller-defined SKU value of the product whose inventory item record you wish to delete.&lt;br/&gt;&lt;br/&gt;&lt;strong&gt;Max length&lt;/strong&gt;: 50. (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteInventoryItemWithHttpInfo(string $sku): array
    {
        $request = $this->deleteInventoryItemRequest($sku);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'deleteInventoryItem'
     *
     * @param  string  $sku  This is the seller-defined SKU value of the product whose inventory item record you wish to delete.&lt;br/&gt;&lt;br/&gt;&lt;strong&gt;Max length&lt;/strong&gt;: 50. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function deleteInventoryItemRequest(string $sku): Request
    {
        $resourcePath = '/inventory_item/{sku}';
        $resourcePath = str_replace(
            '{' . 'sku' . '}',
            Serializer::toPathValue($sku),
            $resourcePath
        );


        return $this->ebayRequest->deleteRequest($resourcePath);
    }

    /**
     * Operation getInventoryItem
     *
     * @param  string  $sku  This is the seller-defined SKU value of the product whose inventory item record you wish to retrieve.&lt;br/&gt;&lt;br/&gt;&lt;strong&gt;Max length&lt;/strong&gt;: 50. (required)
     *
     * @return InventoryItemWithSkuLocaleGroupId|null
     * @throws ApiException on non-2xx response
     */
    public function getInventoryItem(string $sku): ?InventoryItemWithSkuLocaleGroupId
    {
        $response = $this->getInventoryItemWithHttpInfo($sku);

        return $response['data'] ?? null;
    }

    /**
     * Operation getInventoryItemWithHttpInfo
     *
     * @param  string  $sku  This is the seller-defined SKU value of the product whose inventory item record you wish to retrieve.&lt;br/&gt;&lt;br/&gt;&lt;strong&gt;Max length&lt;/strong&gt;: 50. (required)
     *
     * @return array of InventoryItemWithSkuLocaleGroupId, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getInventoryItemWithHttpInfo(string $sku): array
    {
        $request = $this->getInventoryItemRequest($sku);

        return $this->ebayClient->sendRequest($request, returnType: InventoryItemWithSkuLocaleGroupId::class);
    }

    /**
     * Create request for operation 'getInventoryItem'
     *
     * @param  string  $sku  This is the seller-defined SKU value of the product whose inventory item record you wish to retrieve.&lt;br/&gt;&lt;br/&gt;&lt;strong&gt;Max length&lt;/strong&gt;: 50. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getInventoryItemRequest(string $sku): Request
    {
        $resourcePath = '/inventory_item/{sku}';
        $resourcePath = str_replace(
            '{' . 'sku' . '}',
            Serializer::toPathValue($sku),
            $resourcePath
        );

        return $this->ebayRequest->getRequest($resourcePath);
    }

    /**
     * Operation getInventoryItems
     *
     * @param  string|null  $limit  The value passed in this query parameter sets the maximum number of records to return per page of data. Although this field is a string, the value passed in this field should be an integer  from &lt;code&gt;1&lt;/code&gt; to &lt;code&gt;100&lt;/code&gt;. If this query parameter is not set, up to 100 records will be returned on each page of results.&lt;br/&gt;&lt;br/&gt;&lt;strong&gt;Min&lt;/strong&gt;: 1, &lt;strong&gt;Max&lt;/strong&gt;: 100 (optional)
     * @param  string|null  $offset  The value passed in this query parameter sets the page number to retrieve. The first page of records has a value of &lt;code&gt;0&lt;/code&gt;, the second page of records has a value of &lt;code&gt;1&lt;/code&gt;, and so on. If this query parameter is not set, its value defaults to &lt;code&gt;0&lt;/code&gt;, and the first page of records is returned. (optional)
     *
     * @return InventoryItems|null
     * @throws ApiException on non-2xx response
     */
    public function getInventoryItems(string $limit = null, string $offset = null): ?InventoryItems
    {
        $response = $this->getInventoryItemsWithHttpInfo($limit, $offset);

        return $response['data'] ?? null;
    }

    /**
     * Operation getInventoryItemsWithHttpInfo
     *
     * @param  string|null  $limit  The value passed in this query parameter sets the maximum number of records to return per page of data. Although this field is a string, the value passed in this field should be an integer  from &lt;code&gt;1&lt;/code&gt; to &lt;code&gt;100&lt;/code&gt;. If this query parameter is not set, up to 100 records will be returned on each page of results.&lt;br/&gt;&lt;br/&gt;&lt;strong&gt;Min&lt;/strong&gt;: 1, &lt;strong&gt;Max&lt;/strong&gt;: 100 (optional)
     * @param  string|null  $offset  The value passed in this query parameter sets the page number to retrieve. The first page of records has a value of &lt;code&gt;0&lt;/code&gt;, the second page of records has a value of &lt;code&gt;1&lt;/code&gt;, and so on. If this query parameter is not set, its value defaults to &lt;code&gt;0&lt;/code&gt;, and the first page of records is returned. (optional)
     *
     * @return array of InventoryItems, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function getInventoryItemsWithHttpInfo(string $limit = null, string $offset = null): array
    {
        $request = $this->getInventoryItemsRequest($limit, $offset);

        return $this->ebayClient->sendRequest($request, returnType: InventoryItems::class);
    }

    /**
     * Create request for operation 'getInventoryItems'
     *
     * @param  string|null  $limit  The value passed in this query parameter sets the maximum number of records to return per page of data. Although this field is a string, the value passed in this field should be an integer  from &lt;code&gt;1&lt;/code&gt; to &lt;code&gt;100&lt;/code&gt;. If this query parameter is not set, up to 100 records will be returned on each page of results.&lt;br/&gt;&lt;br/&gt;&lt;strong&gt;Min&lt;/strong&gt;: 1, &lt;strong&gt;Max&lt;/strong&gt;: 100 (optional)
     * @param  string|null  $offset  The value passed in this query parameter sets the page number to retrieve. The first page of records has a value of &lt;code&gt;0&lt;/code&gt;, the second page of records has a value of &lt;code&gt;1&lt;/code&gt;, and so on. If this query parameter is not set, its value defaults to &lt;code&gt;0&lt;/code&gt;, and the first page of records is returned. (optional)
     *
     * @return Request
     */
    protected function getInventoryItemsRequest(string $limit = null, string $offset = null): Request
    {
        $resourcePath = '/inventory_item';

        $queryParameters = [
            'limit' => $limit,
            'offset' => $offset,
        ];

        return $this->ebayRequest->getRequest($resourcePath, $queryParameters);
    }
}
