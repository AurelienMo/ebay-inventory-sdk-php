<?php

namespace SapientPro\EbayInventorySDK\Api;

use SapientPro\EbayInventorySDK\ApiException;
use SapientPro\EbayInventorySDK\Client\EbayClient;
use SapientPro\EbayInventorySDK\Client\EbayRequest;
use SapientPro\EbayInventorySDK\Client\Serializer;
use SapientPro\EbayInventorySDK\Configuration;
use SapientPro\EbayInventorySDK\Enums\LocaleEnum;
use SapientPro\EbayInventorySDK\HeaderSelector;
use SapientPro\EbayInventorySDK\Models\BaseResponse;
use SapientPro\EbayInventorySDK\Models\InventoryItemGroup;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InventoryItemGroupApi implements ApiInterface
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
     * Operation createOrReplaceInventoryItemGroup
     *
     * @param  InventoryItemGroup  $body  Details of the inventory Item Group (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $inventoryItemGroupKey  Unique identifier of the inventory item group. This identifier is supplied by the seller. The &lt;strong&gt;inventoryItemGroupKey&lt;/strong&gt; value for the inventory item group to create/update is passed in at the end of the call URI. This value cannot be changed once it is set. (required)
     *
     * @return BaseResponse|null
     * @throws ApiException on non-2xx response
     */
    public function createOrReplaceInventoryItemGroup(
        InventoryItemGroup $body,
        LocaleEnum $contentLanguage,
        string $inventoryItemGroupKey
    ): ?BaseResponse {
        $response = $this->createOrReplaceInventoryItemGroupWithHttpInfo(
            $body,
            $contentLanguage,
            $inventoryItemGroupKey
        );

        return $response['data'] ?? null;
    }

    /**
     * Operation createOrReplaceInventoryItemGroupWithHttpInfo
     *
     * @param  InventoryItemGroup  $body  Details of the inventory Item Group (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $inventoryItemGroupKey  Unique identifier of the inventory item group. This identifier is supplied by the seller. The &lt;strong&gt;inventoryItemGroupKey&lt;/strong&gt; value for the inventory item group to create/update is passed in at the end of the call URI. This value cannot be changed once it is set. (required)
     *
     * @return array of BaseResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function createOrReplaceInventoryItemGroupWithHttpInfo(
        InventoryItemGroup $body,
        LocaleEnum $contentLanguage,
        string $inventoryItemGroupKey
    ): array {
        $returnType = BaseResponse::class;
        $request = $this->createOrReplaceInventoryItemGroupRequest($body, $contentLanguage, $inventoryItemGroupKey);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'createOrReplaceInventoryItemGroup'
     *
     * @param  InventoryItemGroup  $body  Details of the inventory Item Group (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $inventoryItemGroupKey  Unique identifier of the inventory item group. This identifier is supplied by the seller. The &lt;strong&gt;inventoryItemGroupKey&lt;/strong&gt; value for the inventory item group to create/update is passed in at the end of the call URI. This value cannot be changed once it is set. (required)
     *
     * @return Request
     */
    protected function createOrReplaceInventoryItemGroupRequest(
        InventoryItemGroup $body,
        LocaleEnum $contentLanguage,
        string $inventoryItemGroupKey
    ): Request {
        $resourcePath = '/inventory_item_group/{inventoryItemGroupKey}';
        $resourcePath = str_replace(
            '{' . 'inventoryItemGroupKey' . '}',
            Serializer::toPathValue($inventoryItemGroupKey),
            $resourcePath
        );

        return $this->ebayRequest->putRequest(
            $body,
            $resourcePath,
            headerParameters: ['Content-Language' => $contentLanguage->value]
        );
    }

    /**
     * Operation deleteInventoryItemGroup
     *
     * @param  string  $inventoryItemGroupKey  The unique identifier of an inventory item group. This value is assigned by the seller when an inventory item group is created. The &lt;strong&gt;inventoryItemGroupKey&lt;/strong&gt; value for the inventory item group to delete is passed in at the end of the call URI. (required)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteInventoryItemGroup(string $inventoryItemGroupKey): void
    {
        $this->deleteInventoryItemGroupWithHttpInfo($inventoryItemGroupKey);
    }

    /**
     * Operation deleteInventoryItemGroupWithHttpInfo
     *
     * @param  string  $inventoryItemGroupKey  The unique identifier of an inventory item group. This value is assigned by the seller when an inventory item group is created. The &lt;strong&gt;inventoryItemGroupKey&lt;/strong&gt; value for the inventory item group to delete is passed in at the end of the call URI. (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteInventoryItemGroupWithHttpInfo(string $inventoryItemGroupKey): array
    {
        $request = $this->deleteInventoryItemGroupRequest($inventoryItemGroupKey);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'deleteInventoryItemGroup'
     *
     * @param  string  $inventoryItemGroupKey  The unique identifier of an inventory item group. This value is assigned by the seller when an inventory item group is created. The &lt;strong&gt;inventoryItemGroupKey&lt;/strong&gt; value for the inventory item group to delete is passed in at the end of the call URI. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function deleteInventoryItemGroupRequest(string $inventoryItemGroupKey): Request
    {
        $resourcePath = '/inventory_item_group/{inventoryItemGroupKey}';
        $resourcePath = str_replace(
            '{' . 'inventoryItemGroupKey' . '}',
            Serializer::toPathValue($inventoryItemGroupKey),
            $resourcePath
        );

        return $this->ebayRequest->deleteRequest($resourcePath);
    }

    /**
     * Operation getInventoryItemGroup
     *
     * @param  string  $inventoryItemGroupKey  The unique identifier of an inventory item group. This value is assigned by the seller when an inventory item group is created. The &lt;strong&gt;inventoryItemGroupKey&lt;/strong&gt; value for the inventory item group to retrieve is passed in at the end of the call URI. (required)
     *
     * @return InventoryItemGroup
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getInventoryItemGroup(string $inventoryItemGroupKey): InventoryItemGroup
    {
        $response = $this->getInventoryItemGroupWithHttpInfo($inventoryItemGroupKey);

        return $response['data'];
    }

    /**
     * Operation getInventoryItemGroupWithHttpInfo
     *
     * @param  string  $inventoryItemGroupKey  The unique identifier of an inventory item group. This value is assigned by the seller when an inventory item group is created. The &lt;strong&gt;inventoryItemGroupKey&lt;/strong&gt; value for the inventory item group to retrieve is passed in at the end of the call URI. (required)
     *
     * @return array of InventoryItemGroup, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getInventoryItemGroupWithHttpInfo(string $inventoryItemGroupKey): array
    {
        $returnType = InventoryItemGroup::class;
        $request = $this->getInventoryItemGroupRequest($inventoryItemGroupKey);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getInventoryItemGroup'
     *
     * @param  string  $inventoryItemGroupKey  The unique identifier of an inventory item group. This value is assigned by the seller when an inventory item group is created. The &lt;strong&gt;inventoryItemGroupKey&lt;/strong&gt; value for the inventory item group to retrieve is passed in at the end of the call URI. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getInventoryItemGroupRequest(string $inventoryItemGroupKey): Request
    {
        $resourcePath = '/inventory_item_group/{inventoryItemGroupKey}';
        $resourcePath = str_replace(
            '{' . 'inventoryItemGroupKey' . '}',
            Serializer::toPathValue($inventoryItemGroupKey),
            $resourcePath
        );

        return $this->ebayRequest->getRequest($resourcePath);
    }
}
