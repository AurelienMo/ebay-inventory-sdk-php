<?php

namespace SapientPro\EbayInventorySDK\Client;

use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use SapientPro\EbayInventorySDK\Configuration;
use SapientPro\EbayInventorySDK\Enums\HttpMethodEnum;
use SapientPro\EbayInventorySDK\HeaderSelector;
use SapientPro\EbayInventorySDK\Models\EbayModelInterface;

class EbayRequest
{
    public function __construct(
        private HeaderSelector $headerSelector,
        private Configuration $config,
        private Serializer $serializer
    ) {
    }

    public function getRequest(
        string $resourcePath,
        array $queryParameters = null,
        array $headerParameters = null
    ): Request {
        $query = $this->processParameters($queryParameters);
        $headers = $this->processHeaders(HttpMethodEnum::GET, $headerParameters);

        return new Request(
            HttpMethodEnum::GET->value,
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers
        );
    }

    public function postRequest(
        string $resourcePath,
        EbayModelInterface $body = null,
        array $queryParameters = null,
        array $headerParameters = null
    ): Request {
        $query = $this->processParameters($queryParameters);
        $headers = $this->processHeaders(HttpMethodEnum::POST, $headerParameters, $body);
        $serializedBody = $body ? $this->serializer->serialize($body) : null;

        return new Request(
            HttpMethodEnum::POST->value,
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $serializedBody
        );
    }

    public function putRequest(
        EbayModelInterface $body,
        string $resourcePath,
        array $queryParameters = null,
        array $headerParameters = null
    ): Request {
        $query = $this->processParameters($queryParameters);
        $headers = $this->processHeaders(HttpMethodEnum::PUT, $headerParameters, $body);

        return new Request(
            HttpMethodEnum::PUT->value,
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $this->serializer->serialize($body)
        );
    }

    public function deleteRequest(
        string $resourcePath,
        array $queryParameters = null,
        array $headerParameters = null
    ): Request {
        $query = $this->processParameters($queryParameters);
        $headers = $this->processHeaders(HttpMethodEnum::DELETE, $headerParameters);

        return new Request(
            HttpMethodEnum::DELETE->value,
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers
        );
    }

    private function processParameters(array $queryParameters = null): string
    {
        $queryParams = [];

        if (null !== $queryParameters) {
            foreach ($queryParameters as $key => $parameter) {
                $queryParams[$key] = Serializer::toQueryValue($parameter);
            }
        }

        return Query::build($queryParams);
    }

    private function processHeaders(
        HttpMethodEnum $method,
        array $headerParameters = null,
        EbayModelInterface $body = null
    ): array {
        $headerParams = [];

        if (null !== $headerParameters) {
            foreach ($headerParameters as $key => $parameter) {
                $headerParams[$key] = $parameter;
            }
        }

        $headers = match ($method) {
            HttpMethodEnum::GET => $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            ),
            HttpMethodEnum::POST => $this->headerSelector->selectHeaders(
                ['application/json'],
                $body ? ['application/json'] : []
            ),
            HttpMethodEnum::PUT => $this->headerSelector->selectHeaders(
                [],
                ['application/json']
            ),
            HttpMethodEnum::DELETE => $this->headerSelector->selectHeaders(
                [],
                []
            )
        };

        // this endpoint requires OAuth (access token)
        if (null !== $this->config->getAccessToken()) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        return array_merge($defaultHeaders, $headerParams, $headers);
    }
}
