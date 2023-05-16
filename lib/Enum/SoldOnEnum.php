<?php

namespace EBay\Inventory\Enum;

/**
 * This enumeration type is used to indicate if the product was sold for the price in the originalRetailPrice field on an eBay site,
 * or sold for that price by a third-party retailer.
 * This type is only applicable if the seller and listing are eligible to use the Strikethrough Pricing feature,
 * a feature which is limited to the US (core site and Motors), UK, Germany, Canada (English and French versions), France, Italy, and Spain.
 */
final class SoldOnEnum
{
    /** @var string This enumeration value indicates that the product was sold for the price in the originalRetailPrice field on an eBay site. */
    public const ON_EBAY = 'ON_EBAY';
    /** @var string This enumeration value indicates that the product was sold for the originalRetailPrice through a third-party retailer. */
    public const OFF_EBAY = 'OFF_EBAY';
    /** @var string This enumeration value indicates that the product was sold for the originalRetailPrice on an eBay site and through a third-party retailer. */
    public const ON_AND_OFF_EBAY = 'ON_AND_OFF_EBAY';
}
