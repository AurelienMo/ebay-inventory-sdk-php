<?php

namespace SapientPro\EbayInventorySDK;

use InvalidArgumentException;

/**
 * @package  SapientPro\EbayInventorySDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Configuration
{
    private static self $defaultConfiguration;

    /**
     * Associate array to store API key(s)
     *
     * @var string[]
     */
    protected array $apiKeys = [];

    /**
     * Associate array to store API prefix (e.g. Bearer)
     *
     * @var string[]
     */
    protected array $apiKeyPrefixes = [];

    /**
     * Access token for OAuth
     *
     * @var string
     */
    protected string $accessToken = '';

    /**
     * Username for HTTP basic authentication
     *
     * @var string
     */
    protected string $username = '';

    /**
     * Password for HTTP basic authentication
     *
     * @var string
     */
    protected string $password = '';

    /**
     * The host
     *
     * @var string
     */
    protected string $host = 'https://api.ebay.com/sell/inventory/v1';

    /**
     * User agent of the HTTP request, set to "PHP-Swagger" by default
     *
     * @var string
     */
    protected string $userAgent = 'Swagger-Codegen/1.16.2/php';

    /**
     * Gets the default configuration instance
     *
     * @return Configuration
     */
    public static function getDefaultConfiguration(): self
    {
        if (!isset(self::$defaultConfiguration)) {
            self::$defaultConfiguration = new Configuration();
        }

        return self::$defaultConfiguration;
    }

    /**
     * Sets the detault configuration instance
     *
     * @param  Configuration  $config  An instance of the Configuration Object
     *
     * @return void
     */
    public static function setDefaultConfiguration(Configuration $config): void
    {
        self::$defaultConfiguration = $config;
    }

    /**
     * Sets API key
     *
     * @param  string  $apiKeyIdentifier  API key identifier (authentication scheme)
     * @param  string  $key  API key or token
     *
     * @return $this
     */
    public function setApiKey(string $apiKeyIdentifier, string $key): self
    {
        $this->apiKeys[$apiKeyIdentifier] = $key;

        return $this;
    }

    /**
     * Sets the prefix for API key (e.g. Bearer)
     *
     * @param  string  $apiKeyIdentifier  API key identifier (authentication scheme)
     * @param  string  $prefix  API key prefix, e.g. Bearer
     *
     * @return $this
     */
    public function setApiKeyPrefix(string $apiKeyIdentifier, string $prefix): self
    {
        $this->apiKeyPrefixes[$apiKeyIdentifier] = $prefix;

        return $this;
    }

    /**
     * Gets the access token for OAuth
     *
     * @return string Access token for OAuth
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Sets the access token for OAuth
     *
     * @param  string  $accessToken  Token for OAuth
     *
     * @return $this
     */
    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * Gets the username for HTTP basic authentication
     *
     * @return string Username for HTTP basic authentication
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Sets the username for HTTP basic authentication
     *
     * @param  string  $username  Username for HTTP basic authentication
     *
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Gets the password for HTTP basic authentication
     *
     * @return string Password for HTTP basic authentication
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Sets the password for HTTP basic authentication
     *
     * @param  string  $password  Password for HTTP basic authentication
     *
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Gets the host
     *
     * @return string Host
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Sets the host
     *
     * @param  string  $host  Host
     *
     * @return $this
     */
    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Sets the user agent of the api client
     *
     * @param  string  $userAgent  the user agent of the api client
     *
     * @return $this
     * @throws InvalidArgumentException
     */
    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get API key (with prefix if set)
     *
     * @param  string  $apiKeyIdentifier  name of apikey
     *
     * @return string|null API key with the prefix
     */
    public function getApiKeyWithPrefix(string $apiKeyIdentifier): ?string
    {
        $prefix = $this->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->getApiKey($apiKeyIdentifier);

        if (null === $apiKey) {
            return null;
        }

        if (null === $prefix) {
            return $apiKey;
        }

        return $prefix . ' ' . $apiKey;
    }

    /**
     * Gets API key prefix
     *
     * @param  string  $apiKeyIdentifier  API key identifier (authentication scheme)
     *
     * @return string|null
     */
    public function getApiKeyPrefix(string $apiKeyIdentifier): ?string
    {
        return $this->apiKeyPrefixes[$apiKeyIdentifier] ?? null;
    }

    /**
     * Gets API key
     *
     * @param  string  $apiKeyIdentifier  API key identifier (authentication scheme)
     *
     * @return string|null API key or token
     */
    public function getApiKey(string $apiKeyIdentifier): ?string
    {
        return $this->apiKeys[$apiKeyIdentifier] ?? null;
    }
}
