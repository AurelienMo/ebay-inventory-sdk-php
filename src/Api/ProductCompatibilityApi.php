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
use SapientPro\EbayInventorySDK\Models\Compatibility;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProductCompatibilityApi implements ApiInterface
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
     * Operation createOrReplaceProductCompatibility
     *
     * @param  Compatibility  $body  Details of the compatibility (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $sku  A SKU (stock keeping unit) is an unique identifier defined by a seller for a product (required)
     *
     * @return BaseResponse|null
     * @throws ApiException on non-2xx response
     */
    public function createOrReplaceProductCompatibility(
        Compatibility $body,
        LocaleEnum $contentLanguage,
        string $sku
    ): ?BaseResponse {
        $response = $this->createOrReplaceProductCompatibilityWithHttpInfo($body, $contentLanguage, $sku);

        return $response['data'] ?? null;
    }

    /**
     * Operation createOrReplaceProductCompatibilityWithHttpInfo
     *
     * @param  Compatibility  $body  Details of the compatibility (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $sku  A SKU (stock keeping unit) is an unique identifier defined by a seller for a product (required)
     *
     * @return array of \SapientPro\EbayInventorySDK\Model\BaseResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function createOrReplaceProductCompatibilityWithHttpInfo(
        Compatibility $body,
        LocaleEnum $contentLanguage,
        string $sku
    ): array {
        $returnType = BaseResponse::class;
        $request = $this->createOrReplaceProductCompatibilityRequest($body, $contentLanguage, $sku);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'createOrReplaceProductCompatibility'
     *
     * @param  Compatibility  $body  Details of the compatibility (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $sku  A SKU (stock keeping unit) is an unique identifier defined by a seller for a product (required)
     *
     * @return Request
     */
    protected function createOrReplaceProductCompatibilityRequest(
        Compatibility $body,
        LocaleEnum $contentLanguage,
        string $sku
    ): Request {
        $resourcePath = '/inventory_item/{sku}/product_compatibility';
        $resourcePath = str_replace(
            '{' . 'sku' . '}',
            Serializer::toPathValue($sku),
            $resourcePath
        );

        return $this->ebayRequest->putRequest(
            $body,
            $resourcePath,
            headerParameters: ['Content-Language' => $contentLanguage->value]
        );
    }

    /**
     * Operation deleteProductCompatibility
     *
     * @param  string  $sku  A SKU (stock keeping unit) is an unique identifier defined by a seller for a product (required)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteProductCompatibility(string $sku): void
    {
        $this->deleteProductCompatibilityWithHttpInfo($sku);
    }

    /**
     * Operation deleteProductCompatibilityWithHttpInfo
     *
     * @param  string  $sku  A SKU (stock keeping unit) is an unique identifier defined by a seller for a product (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteProductCompatibilityWithHttpInfo(string $sku): array
    {
        $request = $this->deleteProductCompatibilityRequest($sku);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'deleteProductCompatibility'
     *
     * @param  string  $sku  A SKU (stock keeping unit) is an unique identifier defined by a seller for a product (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function deleteProductCompatibilityRequest(string $sku): Request
    {
        $resourcePath = '/inventory_item/{sku}/product_compatibility';
        $resourcePath = str_replace(
            '{' . 'sku' . '}',
            Serializer::toPathValue($sku),
            $resourcePath
        );

        return $this->ebayRequest->deleteRequest($resourcePath);
    }

    /**
     * Operation getProductCompatibility
     *
     * @param  string  $sku  A SKU (stock keeping unit) is an unique identifier defined by a seller for a product
     *
     * @return Compatibility
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getProductCompatibility(string $sku): Compatibility
    {
        $response = $this->getProductCompatibilityWithHttpInfo($sku);

        return $response['data'];
    }

    /**
     * Operation getProductCompatibilityWithHttpInfo
     *
     * @param  string  $sku  A SKU (stock keeping unit) is an unique identifier defined by a seller for a product (required)
     *
     * @return array of \SapientPro\EbayInventorySDK\Model\Compatibility, HTTP status code, HTTP response headers
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getProductCompatibilityWithHttpInfo(string $sku): array
    {
        $returnType = Compatibility::class;
        $request = $this->getProductCompatibilityRequest($sku);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getProductCompatibility'
     *
     * @param  string  $sku  A SKU (stock keeping unit) is an unique identifier defined by a seller for a product (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getProductCompatibilityRequest(string $sku): Request
    {
        $resourcePath = '/inventory_item/{sku}/product_compatibility';
        $resourcePath = str_replace(
            '{' . 'sku' . '}',
            Serializer::toPathValue($sku),
            $resourcePath
        );

        return $this->ebayRequest->getRequest($resourcePath);
    }
}
