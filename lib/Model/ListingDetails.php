<?php
/**
 * ListingDetails
 *
 * PHP version 5
 *
 * @category Class
 * @package  EBay\Inventory
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Inventory API
 *
 * The Inventory API is used to create and manage inventory, and then to publish and manage this inventory on an eBay marketplace. There are also methods in this API that will convert eligible, active eBay listings into the Inventory API model.
 *
 * OpenAPI spec version: 1.16.0
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.33
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace EBay\Inventory\Model;

use ArrayAccess;
use EBay\Inventory\ObjectSerializer;

/**
 * ListingDetails Class Doc Comment
 *
 * @category Class
 * @description This type is used by the &lt;strong&gt;listing&lt;/strong&gt; container in the &lt;strong&gt;getOffer&lt;/strong&gt; and &lt;strong&gt;getOffers&lt;/strong&gt; calls to provide the eBay listing ID, the listing status, and quantity sold for the offer. The &lt;strong&gt;listing&lt;/strong&gt; container is only returned for published offers, and is not returned for unpublished offers.
 * @package  EBay\Inventory
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ListingDetails implements ModelInterface, ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'ListingDetails';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes
        = [
            'listingId'     => 'string',
            'listingStatus' => 'string',
            'soldQuantity'  => 'int',
        ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats
        = [
            'listingId'     => null,
            'listingStatus' => null,
            'soldQuantity'  => 'int32',
        ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap
        = [
            'listingId'     => 'listingId',
            'listingStatus' => 'listingStatus',
            'soldQuantity'  => 'soldQuantity',
        ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters
        = [
            'listingId'     => 'setListingId',
            'listingStatus' => 'setListingStatus',
            'soldQuantity'  => 'setSoldQuantity',
        ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters
        = [
            'listingId'     => 'getListingId',
            'listingStatus' => 'getListingStatus',
            'soldQuantity'  => 'getSoldQuantity',
        ];
    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param  mixed[]  $data  Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['listingId'] = $data['listingId'] ?? null;
        $this->container['listingStatus'] = $data['listingStatus'] ?? null;
        $this->container['soldQuantity'] = $data['soldQuantity'] ?? null;
    }

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Gets listingId
     *
     * @return string
     */
    public function getListingId()
    {
        return $this->container['listingId'];
    }

    /**
     * Sets listingId
     *
     * @param  string  $listingId  The unique identifier of the eBay listing that is associated with the published offer.
     *
     * @return $this
     */
    public function setListingId($listingId)
    {
        $this->container['listingId'] = $listingId;

        return $this;
    }

    /**
     * Gets listingStatus
     *
     * @return string
     */
    public function getListingStatus()
    {
        return $this->container['listingStatus'];
    }

    /**
     * Sets listingStatus
     *
     * @param  string  $listingStatus  The enumeration value returned in this field indicates the status of the listing that is associated with the published offer. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:ListingStatusEnum'>eBay API documentation</a>
     *
     * @return $this
     */
    public function setListingStatus($listingStatus)
    {
        $this->container['listingStatus'] = $listingStatus;

        return $this;
    }

    /**
     * Gets soldQuantity
     *
     * @return int
     */
    public function getSoldQuantity()
    {
        return $this->container['soldQuantity'];
    }

    /**
     * Sets soldQuantity
     *
     * @param  int  $soldQuantity  This integer value indicates the quantity of the product that has been sold for the published offer.
     *
     * @return $this
     */
    public function setSoldQuantity($soldQuantity)
    {
        $this->container['soldQuantity'] = $soldQuantity;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param  integer  $offset  Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param  integer  $offset  Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param  integer  $offset  Offset
     * @param  mixed  $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param  integer  $offset  Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}