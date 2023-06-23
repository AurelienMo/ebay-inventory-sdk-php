<?php

namespace SapientPro\EbayInventorySDK\Api;

use SapientPro\EbayInventorySDK\ApiException;
use SapientPro\EbayInventorySDK\Client\EbayClient;
use SapientPro\EbayInventorySDK\Client\EbayRequest;
use SapientPro\EbayInventorySDK\Client\Serializer;
use SapientPro\EbayInventorySDK\Configuration;
use SapientPro\EbayInventorySDK\Enums\FormatTypeEnum;
use SapientPro\EbayInventorySDK\Enums\LocaleEnum;
use SapientPro\EbayInventorySDK\Enums\MarketplaceEnum;
use SapientPro\EbayInventorySDK\HeaderSelector;
use SapientPro\EbayInventorySDK\Models\BulkEbayOfferDetailsWithKeys;
use SapientPro\EbayInventorySDK\Models\BulkOffer;
use SapientPro\EbayInventorySDK\Models\BulkOfferResponse;
use SapientPro\EbayInventorySDK\Models\BulkPublishResponse;
use SapientPro\EbayInventorySDK\Models\EbayOfferDetailsWithAll;
use SapientPro\EbayInventorySDK\Models\EbayOfferDetailsWithId;
use SapientPro\EbayInventorySDK\Models\EbayOfferDetailsWithKeys;
use SapientPro\EbayInventorySDK\Models\FeesSummaryResponse;
use SapientPro\EbayInventorySDK\Models\OfferKeysWithId;
use SapientPro\EbayInventorySDK\Models\OfferResponse;
use SapientPro\EbayInventorySDK\Models\Offers;
use SapientPro\EbayInventorySDK\Models\PublishByInventoryItemGroupRequest;
use SapientPro\EbayInventorySDK\Models\PublishResponse;
use SapientPro\EbayInventorySDK\Models\WithdrawByInventoryItemGroupRequest;
use SapientPro\EbayInventorySDK\Models\WithdrawResponse;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class OfferApi implements ApiInterface
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
     * Operation bulkCreateOffer
     *
     * @param  BulkEbayOfferDetailsWithKeys  $body  Details of the offer for the channel (required)
     * @param  LocaleEnum  $contentLanguage
     * @return BulkOfferResponse
     * @throws ApiException on non-2xx response
     */
    public function bulkCreateOffer(BulkEbayOfferDetailsWithKeys $body, LocaleEnum $contentLanguage): BulkOfferResponse
    {
        $response = $this->bulkCreateOfferWithHttpInfo($body, $contentLanguage);

        return $response['data'];
    }

    /**
     * Operation bulkCreateOfferWithHttpInfo
     *
     * @param  BulkEbayOfferDetailsWithKeys  $body  Details of the offer for the channel (required)
     *
     * @return array of BulkOfferResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function bulkCreateOfferWithHttpInfo(BulkEbayOfferDetailsWithKeys $body, LocaleEnum $contentLanguage): array
    {
        $returnType = BulkOfferResponse::class;
        $request = $this->bulkCreateOfferRequest($body, $contentLanguage);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'bulkCreateOffer'
     *
     * @param  BulkEbayOfferDetailsWithKeys  $body  Details of the offer for the channel (required)
     * @param  LocaleEnum  $contentLanguage
     * @return Request
     */
    protected function bulkCreateOfferRequest(BulkEbayOfferDetailsWithKeys $body, LocaleEnum $contentLanguage): Request
    {
        $resourcePath = '/bulk_create_offer';

        return $this->ebayRequest->postRequest(
            $resourcePath,
            $body,
            headerParameters: ['Content-Language' => $contentLanguage->value]
        );
    }

    /**
     * Operation bulkPublishOffer
     *
     * @param  BulkOffer  $body  The base request of the &lt;strong&gt;bulkPublishOffer&lt;/strong&gt; method. (required)
     *
     * @return BulkPublishResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function bulkPublishOffer(BulkOffer $body): BulkPublishResponse
    {
        $response = $this->bulkPublishOfferWithHttpInfo($body);

        return $response['data'];
    }

    /**
     * Operation bulkPublishOfferWithHttpInfo
     *
     * @param  BulkOffer  $body  The base request of the &lt;strong&gt;bulkPublishOffer&lt;/strong&gt; method. (required)
     *
     * @return array of BulkPublishResponse, HTTP status code, HTTP response headers
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function bulkPublishOfferWithHttpInfo(BulkOffer $body): array
    {
        $returnType = BulkPublishResponse::class;
        $request = $this->bulkPublishOfferRequest($body);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'bulkPublishOffer'
     *
     * @param  BulkOffer  $body  The base request of the &lt;strong&gt;bulkPublishOffer&lt;/strong&gt; method. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function bulkPublishOfferRequest(BulkOffer $body): Request
    {
        $resourcePath = '/bulk_publish_offer';

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }

    /**
     * Operation createOffer
     *
     * @param  EbayOfferDetailsWithKeys  $body  Details of the offer for the channel (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     *
     * @return OfferResponse
     * @throws ApiException on non-2xx response
     */
    public function createOffer(EbayOfferDetailsWithKeys $body, LocaleEnum $contentLanguage): OfferResponse
    {
        $response = $this->createOfferWithHttpInfo($body, $contentLanguage);

        return $response['data'];
    }

    /**
     * Operation createOfferWithHttpInfo
     *
     * @param  EbayOfferDetailsWithKeys  $body  Details of the offer for the channel (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     *
     * @return array of OfferResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function createOfferWithHttpInfo(EbayOfferDetailsWithKeys $body, LocaleEnum $contentLanguage): array
    {
        $returnType = OfferResponse::class;
        $request = $this->createOfferRequest($body, $contentLanguage);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'createOffer'
     *
     * @param  EbayOfferDetailsWithKeys  $body  Details of the offer for the channel (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     *
     * @return Request
     */
    protected function createOfferRequest(EbayOfferDetailsWithKeys $body, LocaleEnum $contentLanguage): Request
    {
        $resourcePath = '/offer';

        return $this->ebayRequest->postRequest(
            $resourcePath,
            $body,
            headerParameters: ['Content-Language' => $contentLanguage->value]
        );
    }

    /**
     * Operation deleteOffer
     *
     * @param  string  $offerId  The unique identifier of the offer to delete. The unique identifier of the offer (&lt;strong&gt;offerId&lt;/strong&gt;) is passed in at the end of the call URI. (required)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteOffer(string $offerId): void
    {
        $this->deleteOfferWithHttpInfo($offerId);
    }

    /**
     * Operation deleteOfferWithHttpInfo
     *
     * @param  string  $offerId  The unique identifier of the offer to delete. The unique identifier of the offer (&lt;strong&gt;offerId&lt;/strong&gt;) is passed in at the end of the call URI. (required)
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function deleteOfferWithHttpInfo(string $offerId): array
    {
        $request = $this->deleteOfferRequest($offerId);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'deleteOffer'
     *
     * @param  string  $offerId  The unique identifier of the offer to delete. The unique identifier of the offer (&lt;strong&gt;offerId&lt;/strong&gt;) is passed in at the end of the call URI. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function deleteOfferRequest(string $offerId): Request
    {
        $resourcePath = '/offer/{offerId}';
        $resourcePath = str_replace(
            '{' . 'offerId' . '}',
            Serializer::toPathValue($offerId),
            $resourcePath
        );

        return $this->ebayRequest->deleteRequest($resourcePath);
    }

    /**
     * Operation getListingFees
     *
     * @param  OfferKeysWithId  $body  List of offers that needs fee information
     *
     * @return FeesSummaryResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getListingFees(OfferKeysWithId $body): FeesSummaryResponse
    {
        $response = $this->getListingFeesWithHttpInfo($body);

        return $response['data'];
    }

    /**
     * Operation getListingFeesWithHttpInfo
     *
     * @param  OfferKeysWithId  $body  List of offers that needs fee information
     *
     * @return array of FeesSummaryResponse, HTTP status code, HTTP response headers
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getListingFeesWithHttpInfo(OfferKeysWithId $body): array
    {
        $returnType = FeesSummaryResponse::class;
        $request = $this->getListingFeesRequest($body);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getListingFees'
     *
     * @param  OfferKeysWithId  $body  List of offers that needs fee information
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getListingFeesRequest(OfferKeysWithId $body): Request
    {
        $resourcePath = '/offer/get_listing_fees';

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }

    /**
     * Operation getOffer
     *
     * @param  string  $offerId  The unique identifier of the offer that is to be retrieved. (required)
     *
     * @return EbayOfferDetailsWithAll
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getOffer(string $offerId): EbayOfferDetailsWithAll
    {
        $response = $this->getOfferWithHttpInfo($offerId);

        return $response['data'];
    }

    /**
     * Operation getOfferWithHttpInfo
     *
     * @param  string  $offerId  The unique identifier of the offer that is to be retrieved. (required)
     *
     * @return array of EbayOfferDetailsWithAll, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getOfferWithHttpInfo(string $offerId): array
    {
        $returnType = EbayOfferDetailsWithAll::class;
        $request = $this->getOfferRequest($offerId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getOffer'
     *
     * @param  string  $offerId  The unique identifier of the offer that is to be retrieved. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getOfferRequest(string $offerId): Request
    {
        $resourcePath = '/offer/{offerId}';
        $resourcePath = str_replace(
            '{' . 'offerId' . '}',
            Serializer::toPathValue($offerId),
            $resourcePath
        );

        return $this->ebayRequest->getRequest($resourcePath);
    }

    /**
     * Operation getOffers
     *
     * @param  string  $sku  The seller-defined SKU value is passed in as a query parameter. All offers associated with this product are returned in the response.&lt;br/&gt;&lt;br/&gt; &lt;strong&gt;Max length&lt;/strong&gt;: 50.
     * @param  FormatTypeEnum|null  $format  This enumeration value sets the listing format for the offer. This query parameter will be passed in if the seller only wants to see offers in this specified listing format. (optional)
     * @param  MarketplaceEnum|null  $marketplaceId  The unique identifier of the eBay marketplace. This query parameter will be passed in if the seller only wants to see the product&#x27;s offers on a specific eBay marketplace.&lt;br /&gt;&lt;br /&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; At this time, the same SKU value can not be offered across multiple eBay marketplaces, so the &lt;strong&gt;marketplace_id&lt;/strong&gt; query parameter currently does not have any practical use for this call.&lt;/span&gt; (optional)
     * @param  string|null  $offset  The value passed in this query parameter sets the page number to retrieve. Although this field is a string, the value passed in this field should be a integer value equal to or greater than &lt;code&gt;0&lt;/code&gt;. The first page of records has a value of &lt;code&gt;0&lt;/code&gt;, the second page of records has a value of &lt;code&gt;1&lt;/code&gt;, and so on. If this query parameter is not set, its value defaults to &lt;code&gt;0&lt;/code&gt;, and the first page of records is returned. (optional)
     * @param  string|null  $limit  The value passed in this query parameter sets the maximum number of records to return per page of data. Although this field is a string, the value passed in this field should be a positive integer value. If this query parameter is not set, up to 100 records will be returned on each page of results. (optional)
     * @return Offers
     * @throws ApiException on non-2xx response
     */
    public function getOffers(
        string $sku,
        FormatTypeEnum $format = null,
        MarketplaceEnum $marketplaceId = null,
        string $limit = null,
        string $offset = null
    ): Offers {
        $response = $this->getOffersWithHttpInfo($sku, $format, $marketplaceId, $limit, $offset);

        return $response['data'];
    }

    /**
     * Operation getOffersWithHttpInfo
     *
     * @param  string  $sku  The seller-defined SKU value is passed in as a query parameter. All offers associated with this product are returned in the response.&lt;br/&gt;&lt;br/&gt; &lt;strong&gt;Max length&lt;/strong&gt;: 50.
     * @param  FormatTypeEnum|null  $format  This enumeration value sets the listing format for the offer. This query parameter will be passed in if the seller only wants to see offers in this specified listing format. (optional)
     * @param  MarketplaceEnum|null  $marketplaceId  The unique identifier of the eBay marketplace. This query parameter will be passed in if the seller only wants to see the product&#x27;s offers on a specific eBay marketplace.&lt;br /&gt;&lt;br /&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; At this time, the same SKU value can not be offered across multiple eBay marketplaces, so the &lt;strong&gt;marketplace_id&lt;/strong&gt; query parameter currently does not have any practical use for this call.&lt;/span&gt; (optional)
     * @param  string|null  $limit  The value passed in this query parameter sets the maximum number of records to return per page of data. Although this field is a string, the value passed in this field should be a positive integer value. If this query parameter is not set, up to 100 records will be returned on each page of results. (optional)
     * @param  string|null  $offset  The value passed in this query parameter sets the page number to retrieve. Although this field is a string, the value passed in this field should be a integer value equal to or greater than &lt;code&gt;0&lt;/code&gt;. The first page of records has a value of &lt;code&gt;0&lt;/code&gt;, the second page of records has a value of &lt;code&gt;1&lt;/code&gt;, and so on. If this query parameter is not set, its value defaults to &lt;code&gt;0&lt;/code&gt;, and the first page of records is returned. (optional)
     * @return array of Offers, HTTP status code, HTTP response headers
     * @throws ApiException on non-2xx response
     */
    public function getOffersWithHttpInfo(
        string $sku,
        FormatTypeEnum $format = null,
        MarketplaceEnum $marketplaceId = null,
        string $limit = null,
        string $offset = null
    ): array {
        $returnType = Offers::class;
        $request = $this->getOffersRequest($sku, $format, $marketplaceId, $limit, $offset);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'getOffers'
     *
     * @param  string  $sku  The seller-defined SKU value is passed in as a query parameter. All offers associated with this product are returned in the response.&lt;br/&gt;&lt;br/&gt; &lt;strong&gt;Max length&lt;/strong&gt;: 50.
     * @param  FormatTypeEnum|null  $format  This enumeration value sets the listing format for the offer. This query parameter will be passed in if the seller only wants to see offers in this specified listing format. (optional)
     * @param  MarketplaceEnum|null  $marketplaceId  The unique identifier of the eBay marketplace. This query parameter will be passed in if the seller only wants to see the product&#x27;s offers on a specific eBay marketplace.&lt;br /&gt;&lt;br /&gt;&lt;span class&#x3D;\&quot;tablenote\&quot;&gt;&lt;strong&gt;Note:&lt;/strong&gt; At this time, the same SKU value can not be offered across multiple eBay marketplaces, so the &lt;strong&gt;marketplace_id&lt;/strong&gt; query parameter currently does not have any practical use for this call.&lt;/span&gt; (optional)
     * @param  string|null  $limit  The value passed in this query parameter sets the maximum number of records to return per page of data. Although this field is a string, the value passed in this field should be a positive integer value. If this query parameter is not set, up to 100 records will be returned on each page of results. (optional)
     * @param  string|null  $offset  The value passed in this query parameter sets the page number to retrieve. Although this field is a string, the value passed in this field should be a integer value equal to or greater than &lt;code&gt;0&lt;/code&gt;. The first page of records has a value of &lt;code&gt;0&lt;/code&gt;, the second page of records has a value of &lt;code&gt;1&lt;/code&gt;, and so on. If this query parameter is not set, its value defaults to &lt;code&gt;0&lt;/code&gt;, and the first page of records is returned. (optional)
     * @return Request
     */
    protected function getOffersRequest(
        string $sku,
        FormatTypeEnum $format = null,
        MarketplaceEnum $marketplaceId = null,
        string $limit = null,
        string $offset = null
    ): Request {
        $resourcePath = '/offer';

        $queryParameters = [
            'sku' => $sku,
            'format' => $format,
            'marketplace_id' => $marketplaceId,
            'limit' => $limit,
            'offset' => $offset,
        ];

        return $this->ebayRequest->getRequest($resourcePath, $queryParameters);
    }

    /**
     * Operation publishOffer
     *
     * @param  string  $offerId  The unique identifier of the offer that is to be published. (required)
     *
     * @return PublishResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function publishOffer(string $offerId): PublishResponse
    {
        $response = $this->publishOfferWithHttpInfo($offerId);

        return $response['data'];
    }

    /**
     * Operation publishOfferWithHttpInfo
     *
     * @param  string  $offerId  The unique identifier of the offer that is to be published. (required)
     *
     * @return array of PublishResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function publishOfferWithHttpInfo(string $offerId): array
    {
        $returnType = PublishResponse::class;
        $request = $this->publishOfferRequest($offerId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'publishOffer'
     *
     * @param  string  $offerId  The unique identifier of the offer that is to be published. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function publishOfferRequest(string $offerId): Request
    {
        $resourcePath = '/offer/{offerId}/publish/';
        $resourcePath = str_replace(
            '{' . 'offerId' . '}',
            Serializer::toPathValue($offerId),
            $resourcePath
        );

        return $this->ebayRequest->postRequest($resourcePath);
    }

    /**
     * Operation publishOfferByInventoryItemGroup
     *
     * @param  PublishByInventoryItemGroupRequest  $body  The identifier of the inventory item group to publish and the eBay marketplace where the listing will be published is needed in the request payload. (required)
     *
     * @return PublishResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function publishOfferByInventoryItemGroup(PublishByInventoryItemGroupRequest $body): PublishResponse
    {
        $response = $this->publishOfferByInventoryItemGroupWithHttpInfo($body);

        return $response['data'];
    }

    /**
     * Operation publishOfferByInventoryItemGroupWithHttpInfo
     *
     * @param  PublishByInventoryItemGroupRequest  $body  The identifier of the inventory item group to publish and the eBay marketplace where the listing will be published is needed in the request payload. (required)
     *
     * @return array of PublishResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function publishOfferByInventoryItemGroupWithHttpInfo(PublishByInventoryItemGroupRequest $body): array
    {
        $returnType = PublishResponse::class;
        $request = $this->publishOfferByInventoryItemGroupRequest($body);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'publishOfferByInventoryItemGroup'
     *
     * @param  PublishByInventoryItemGroupRequest  $body  The identifier of the inventory item group to publish and the eBay marketplace where the listing will be published is needed in the request payload. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function publishOfferByInventoryItemGroupRequest(PublishByInventoryItemGroupRequest $body): Request
    {
        $resourcePath = '/offer/publish_by_inventory_item_group/';

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }

    /**
     * Operation updateOffer
     *
     * @param  EbayOfferDetailsWithId  $body  Details of the offer for the channel (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $offerId  The unique identifier of the offer that is being updated. This identifier is passed in at the end of the call URI. (required)
     *
     * @return OfferResponse
     * @throws ApiException on non-2xx response
     */
    public function updateOffer(
        EbayOfferDetailsWithId $body,
        LocaleEnum $contentLanguage,
        string $offerId
    ): ?OfferResponse {
        $response = $this->updateOfferWithHttpInfo($body, $contentLanguage, $offerId);

        return $response['data'] ?? null;
    }

    /**
     * Operation updateOfferWithHttpInfo
     *
     * @param  EbayOfferDetailsWithId  $body  Details of the offer for the channel (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $offerId  The unique identifier of the offer that is being updated. This identifier is passed in at the end of the call URI. (required)
     *
     * @return array of \SapientPro\EbayInventorySDK\Model\OfferResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     */
    public function updateOfferWithHttpInfo(
        EbayOfferDetailsWithId $body,
        LocaleEnum $contentLanguage,
        string $offerId
    ): array {
        $returnType = OfferResponse::class;
        $request = $this->updateOfferRequest($body, $contentLanguage, $offerId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'updateOffer'
     *
     * @param  EbayOfferDetailsWithId  $body  Details of the offer for the channel (required)
     * @param  LocaleEnum  $contentLanguage  This request header sets the natural language that will be provided in the field values of the request payload. (required)
     * @param  string  $offerId  The unique identifier of the offer that is being updated. This identifier is passed in at the end of the call URI. (required)
     *
     * @return Request
     */
    protected function updateOfferRequest(
        EbayOfferDetailsWithId $body,
        LocaleEnum $contentLanguage,
        string $offerId
    ): Request {
        $resourcePath = '/offer/{offerId}';
        $resourcePath = str_replace(
            '{' . 'offerId' . '}',
            Serializer::toPathValue($offerId),
            $resourcePath
        );

        return $this->ebayRequest->putRequest(
            $body,
            $resourcePath,
            headerParameters: ['Content-Language' => $contentLanguage->value]
        );
    }

    /**
     * Operation withdrawOffer
     *
     * @param  string  $offerId  The unique identifier of the offer that is to be withdrawn. This value is passed into the path of the call URI. (required)
     *
     * @return WithdrawResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function withdrawOffer(string $offerId): WithdrawResponse
    {
        $response = $this->withdrawOfferWithHttpInfo($offerId);

        return $response['data'];
    }

    /**
     * Operation withdrawOfferWithHttpInfo
     *
     * @param  string  $offerId  The unique identifier of the offer that is to be withdrawn. This value is passed into the path of the call URI. (required)
     *
     * @return array of \SapientPro\EbayInventorySDK\Model\WithdrawResponse, HTTP status code, HTTP response headers
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function withdrawOfferWithHttpInfo(string $offerId): array
    {
        $returnType = WithdrawResponse::class;
        $request = $this->withdrawOfferRequest($offerId);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * Create request for operation 'withdrawOffer'
     *
     * @param  string  $offerId  The unique identifier of the offer that is to be withdrawn. This value is passed into the path of the call URI. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function withdrawOfferRequest(string $offerId): Request
    {
        $resourcePath = '/offer/{offerId}/withdraw';
        $resourcePath = str_replace(
            '{' . 'offerId' . '}',
            Serializer::toPathValue($offerId),
            $resourcePath
        );

        return $this->ebayRequest->postRequest($resourcePath);
    }

    /**
     * Operation withdrawOfferByInventoryItemGroup
     *
     * @param  WithdrawByInventoryItemGroupRequest  $body  The base request of the &lt;strong&gt;withdrawOfferByInventoryItemGroup&lt;/strong&gt; call. (required)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function withdrawOfferByInventoryItemGroup(WithdrawByInventoryItemGroupRequest $body): void
    {
        $this->withdrawOfferByInventoryItemGroupWithHttpInfo($body);
    }

    /**
     * Operation withdrawOfferByInventoryItemGroupWithHttpInfo
     *
     * @param  WithdrawByInventoryItemGroupRequest  $body  The base request of the &lt;strong&gt;withdrawOfferByInventoryItemGroup&lt;/strong&gt; call. (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function withdrawOfferByInventoryItemGroupWithHttpInfo(WithdrawByInventoryItemGroupRequest $body): array
    {
        $request = $this->withdrawOfferByInventoryItemGroupRequest($body);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'withdrawOfferByInventoryItemGroup'
     *
     * @param  WithdrawByInventoryItemGroupRequest  $body  The base request of the &lt;strong&gt;withdrawOfferByInventoryItemGroup&lt;/strong&gt; call. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function withdrawOfferByInventoryItemGroupRequest(WithdrawByInventoryItemGroupRequest $body): Request
    {
        $resourcePath = '/offer/withdraw_by_inventory_item_group';

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }
}
