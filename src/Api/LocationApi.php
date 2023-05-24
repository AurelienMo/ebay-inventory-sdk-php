<?php

namespace SapientPro\EbayInventorySDK\Api;

use SapientPro\EbayInventorySDK\ApiException;
use SapientPro\EbayInventorySDK\Client\EbayClient;
use SapientPro\EbayInventorySDK\Client\EbayRequest;
use SapientPro\EbayInventorySDK\Client\Serializer;
use SapientPro\EbayInventorySDK\Configuration;
use SapientPro\EbayInventorySDK\HeaderSelector;
use SapientPro\EbayInventorySDK\Models\InventoryLocation;
use SapientPro\EbayInventorySDK\Models\InventoryLocationFull;
use SapientPro\EbayInventorySDK\Models\InventoryLocationResponse;
use SapientPro\EbayInventorySDK\Models\LocationResponse;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class LocationApi implements ApiInterface
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
     * Operation createInventoryLocation
     *
     * @param  InventoryLocationFull  $body  Inventory Location details (required)
     * @param  string  $merchantLocationKey  A unique, merchant-defined key (ID) for an inventory location. This unique identifier, or key, is used in other Inventory API calls to identify an inventory location. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function createInventoryLocation(InventoryLocationFull $body, string $merchantLocationKey): void
    {
        $this->createInventoryLocationWithHttpInfo($body, $merchantLocationKey);
    }

    /**
     * Operation createInventoryLocationWithHttpInfo
     *
     * @param  InventoryLocationFull  $body  Inventory Location details (required)
     * @param  string  $merchantLocationKey  A unique, merchant-defined key (ID) for an inventory location. This unique identifier, or key, is used in other Inventory API calls to identify an inventory location. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function createInventoryLocationWithHttpInfo(InventoryLocationFull $body, string $merchantLocationKey): array
    {
        $request = $this->createInventoryLocationRequest($body, $merchantLocationKey);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'createInventoryLocation'
     *
     * @param  InventoryLocationFull  $body  Inventory Location details (required)
     * @param  string  $merchantLocationKey  A unique, merchant-defined key (ID) for an inventory location. This unique identifier, or key, is used in other Inventory API calls to identify an inventory location. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function createInventoryLocationRequest(InventoryLocationFull $body, string $merchantLocationKey): Request
    {
        $resourcePath = '/location/{merchantLocationKey}';
        $resourcePath = str_replace(
            '{' . 'merchantLocationKey' . '}',
            Serializer::toPathValue($merchantLocationKey),
            $resourcePath
        );

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }

    /**
     * Operation deleteInventoryLocation
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in at the end of the call URI to indicate the inventory location to be deleted. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteInventoryLocation(string $merchantLocationKey): void
    {
        $this->deleteInventoryLocationWithHttpInfo($merchantLocationKey);
    }

    /**
     * Operation deleteInventoryLocationWithHttpInfo
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in at the end of the call URI to indicate the inventory location to be deleted. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteInventoryLocationWithHttpInfo(string $merchantLocationKey): array
    {
        $request = $this->deleteInventoryLocationRequest($merchantLocationKey);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'deleteInventoryLocation'
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in at the end of the call URI to indicate the inventory location to be deleted. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function deleteInventoryLocationRequest(string $merchantLocationKey): Request
    {
        $resourcePath = '/location/{merchantLocationKey}';
        $resourcePath = str_replace(
            '{' . 'merchantLocationKey' . '}',
            Serializer::toPathValue($merchantLocationKey),
            $resourcePath
        );

        return $this->ebayRequest->deleteRequest($resourcePath);
    }

    /**
     * Operation disableInventoryLocation
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in through the call URI to disable the specified inventory location. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return void
     * @throws ApiException on non-2xx response
     */
    public function disableInventoryLocation(string $merchantLocationKey): void
    {
        $this->disableInventoryLocationWithHttpInfo($merchantLocationKey);
    }

    /**
     * Operation disableInventoryLocationWithHttpInfo
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in through the call URI to disable the specified inventory location. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function disableInventoryLocationWithHttpInfo(string $merchantLocationKey): array
    {
        $request = $this->disableInventoryLocationRequest($merchantLocationKey);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'disableInventoryLocation'
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in through the call URI to disable the specified inventory location. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function disableInventoryLocationRequest(string $merchantLocationKey): Request
    {
        $resourcePath = '/location/{merchantLocationKey}/disable';
        $resourcePath = str_replace(
            '{' . 'merchantLocationKey' . '}',
            Serializer::toPathValue($merchantLocationKey),
            $resourcePath
        );

        return $this->ebayRequest->postRequest($resourcePath);
    }

    /**
     * Operation enableInventoryLocation
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in through the call URI to specify the disabled inventory location to enable. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return void
     * @throws ApiException on non-2xx response
     */
    public function enableInventoryLocation(string $merchantLocationKey): void
    {
        $this->enableInventoryLocationWithHttpInfo($merchantLocationKey);
    }

    /**
     * Operation enableInventoryLocationWithHttpInfo
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in through the call URI to specify the disabled inventory location to enable. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function enableInventoryLocationWithHttpInfo(string $merchantLocationKey): array
    {
        $request = $this->enableInventoryLocationRequest($merchantLocationKey);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'enableInventoryLocation'
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in through the call URI to specify the disabled inventory location to enable. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function enableInventoryLocationRequest(string $merchantLocationKey): Request
    {
        $resourcePath = '/location/{merchantLocationKey}/enable';
        $resourcePath = str_replace(
            '{' . 'merchantLocationKey' . '}',
            Serializer::toPathValue($merchantLocationKey),
            $resourcePath
        );

        return $this->ebayRequest->postRequest($resourcePath);
    }

    /**
     * Operation getInventoryLocation
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in at the end of the call URI to specify the inventory location to retrieve. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return InventoryLocationResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getInventoryLocation(string $merchantLocationKey): InventoryLocationResponse
    {
        $response = $this->getInventoryLocationWithHttpInfo($merchantLocationKey);

        return $response['data'];
    }

    /**
     * Operation getInventoryLocationWithHttpInfo
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in at the end of the call URI to specify the inventory location to retrieve. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return array of InventoryLocationResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getInventoryLocationWithHttpInfo(string $merchantLocationKey): array
    {
        $returnType = InventoryLocationResponse::class;
        $request = $this->getInventoryLocationRequest($merchantLocationKey);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getInventoryLocation'
     *
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in at the end of the call URI to specify the inventory location to retrieve. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getInventoryLocationRequest(string $merchantLocationKey): Request
    {
        $resourcePath = '/location/{merchantLocationKey}';
        $resourcePath = str_replace(
            '{' . 'merchantLocationKey' . '}',
            Serializer::toPathValue($merchantLocationKey),
            $resourcePath
        );

        return $this->ebayRequest->getRequest($resourcePath);
    }

    /**
     * Operation getInventoryLocations
     *
     * @param  int|null  $limit  The value passed in this query parameter sets the maximum number of records to return per page of data. Although this field is a string, the value passed in this field should be a positive integer value. If this query parameter is not set, up to 100 records will be returned on each page of results. &lt;br&gt;&lt;br&gt; &lt;strong&gt;Min&lt;/strong&gt;: 1 (optional)
     * @param  int|null  $offset  Specifies the number of locations to skip in the result set before returning the first location in the paginated response.  &lt;p&gt;Combine &lt;b&gt;offset&lt;/b&gt; with the &lt;b&gt;limit&lt;/b&gt; query parameter to control the items returned in the response. For example, if you supply an &lt;b&gt;offset&lt;/b&gt; of &lt;code&gt;0&lt;/code&gt; and a &lt;b&gt;limit&lt;/b&gt; of &lt;code&gt;10&lt;/code&gt;, the first page of the response contains the first 10 items from the complete list of items retrieved by the call. If &lt;b&gt;offset&lt;/b&gt; is &lt;code&gt;10&lt;/code&gt; and &lt;b&gt;limit&lt;/b&gt; is &lt;code&gt;20&lt;/code&gt;, the first page of the response contains items 11-30 from the complete result set.&lt;/p&gt; &lt;p&gt;&lt;b&gt;Default:&lt;/b&gt; 0&lt;/p&gt; (optional)
     *
     * @return LocationResponse
     * @throws ApiException on non-2xx response
     */
    public function getInventoryLocations(int $limit = null, int $offset = null): LocationResponse
    {
        $response = $this->getInventoryLocationsWithHttpInfo($limit, $offset);

        return $response['data'];
    }

    /**
     * Operation getInventoryLocationsWithHttpInfo
     *
     * @param  int|null  $limit  The value passed in this query parameter sets the maximum number of records to return per page of data. Although this field is a string, the value passed in this field should be a positive integer value. If this query parameter is not set, up to 100 records will be returned on each page of results. &lt;br&gt;&lt;br&gt; &lt;strong&gt;Min&lt;/strong&gt;: 1 (optional)
     * @param  int|null  $offset  Specifies the number of locations to skip in the result set before returning the first location in the paginated response.  &lt;p&gt;Combine &lt;b&gt;offset&lt;/b&gt; with the &lt;b&gt;limit&lt;/b&gt; query parameter to control the items returned in the response. For example, if you supply an &lt;b&gt;offset&lt;/b&gt; of &lt;code&gt;0&lt;/code&gt; and a &lt;b&gt;limit&lt;/b&gt; of &lt;code&gt;10&lt;/code&gt;, the first page of the response contains the first 10 items from the complete list of items retrieved by the call. If &lt;b&gt;offset&lt;/b&gt; is &lt;code&gt;10&lt;/code&gt; and &lt;b&gt;limit&lt;/b&gt; is &lt;code&gt;20&lt;/code&gt;, the first page of the response contains items 11-30 from the complete result set.&lt;/p&gt; &lt;p&gt;&lt;b&gt;Default:&lt;/b&gt; 0&lt;/p&gt; (optional)
     *
     * @return array of \SapientPro\EbayInventorySDK\Model\LocationResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function getInventoryLocationsWithHttpInfo(int $limit = null, int $offset = null): array
    {
        $returnType = LocationResponse::class;
        $request = $this->getInventoryLocationsRequest($limit, $offset);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getInventoryLocations'
     *
     * @param  int|null  $limit  The value passed in this query parameter sets the maximum number of records to return per page of data. Although this field is a string, the value passed in this field should be a positive integer value. If this query parameter is not set, up to 100 records will be returned on each page of results. &lt;br&gt;&lt;br&gt; &lt;strong&gt;Min&lt;/strong&gt;: 1 (optional)
     * @param  int|null  $offset  Specifies the number of locations to skip in the result set before returning the first location in the paginated response.  &lt;p&gt;Combine &lt;b&gt;offset&lt;/b&gt; with the &lt;b&gt;limit&lt;/b&gt; query parameter to control the items returned in the response. For example, if you supply an &lt;b&gt;offset&lt;/b&gt; of &lt;code&gt;0&lt;/code&gt; and a &lt;b&gt;limit&lt;/b&gt; of &lt;code&gt;10&lt;/code&gt;, the first page of the response contains the first 10 items from the complete list of items retrieved by the call. If &lt;b&gt;offset&lt;/b&gt; is &lt;code&gt;10&lt;/code&gt; and &lt;b&gt;limit&lt;/b&gt; is &lt;code&gt;20&lt;/code&gt;, the first page of the response contains items 11-30 from the complete result set.&lt;/p&gt; &lt;p&gt;&lt;b&gt;Default:&lt;/b&gt; 0&lt;/p&gt; (optional)
     *
     * @return Request
     */
    protected function getInventoryLocationsRequest(int $limit = null, int $offset = null): Request
    {
        $resourcePath = '/location';
        $queryParams = null;

        // query params
        if ($limit !== null) {
            $queryParams['limit'] = Serializer::toQueryValue($limit);
        }
        // query params
        if ($offset !== null) {
            $queryParams['offset'] = Serializer::toQueryValue($offset);
        }

        return $this->ebayRequest->getRequest($resourcePath, $queryParams);
    }

    /**
     * Operation updateInventoryLocation
     *
     * @param  InventoryLocation  $body  The inventory location details to be updated (other than the address and geo co-ordinates). (required)
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in the call URI to indicate the inventory location to be updated. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function updateInventoryLocation(InventoryLocation $body, string $merchantLocationKey): void
    {
        $this->updateInventoryLocationWithHttpInfo($body, $merchantLocationKey);
    }

    /**
     * Operation updateInventoryLocationWithHttpInfo
     *
     * @param  InventoryLocation  $body  The inventory location details to be updated (other than the address and geo co-ordinates). (required)
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in the call URI to indicate the inventory location to be updated. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function updateInventoryLocationWithHttpInfo(InventoryLocation $body, string $merchantLocationKey): array
    {
        $request = $this->updateInventoryLocationRequest($body, $merchantLocationKey);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'updateInventoryLocation'
     *
     * @param  InventoryLocation  $body  The inventory location details to be updated (other than the address and geo co-ordinates). (required)
     * @param  string  $merchantLocationKey  A unique merchant-defined key (ID) for an inventory location. This value is passed in the call URI to indicate the inventory location to be updated. &lt;br&gt;&lt;br&gt;&lt;b&gt;Max length&lt;/b&gt;: 36 (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function updateInventoryLocationRequest(InventoryLocation $body, string $merchantLocationKey): Request
    {
        $resourcePath = '/location/{merchantLocationKey}/update_location_details';
        $resourcePath = str_replace(
            '{' . 'merchantLocationKey' . '}',
            Serializer::toPathValue($merchantLocationKey),
            $resourcePath
        );

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }
}
