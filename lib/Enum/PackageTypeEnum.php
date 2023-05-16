<?php

namespace EBay\Inventory\Enum;

/**
 * This enumerated type is used to indicate what type of shipping package will be used to ship an inventory item.
 */
final class PackageTypeEnum
{
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a letter. */
    public const LETTER = 'LETTER';
    /** @var string This enumeration value indicates that the inventory item is considered a "bulky good". */
    public const BULKY_GOODS = 'BULKY_GOODS';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a caravan. */
    public const CARAVAN = 'CARAVAN';
    /** @var string This enumeration value indicates that the inventory item is a car */
    public const CARS = 'CARS';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a Euro pallet. */
    public const EUROPALLET = 'EUROPALLET';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is an expandable tough bag. */
    public const EXPANDABLE_TOUGH_BAGS = 'EXPANDABLE_TOUGH_BAGS';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is an extra large pack. */
    public const EXTRA_LARGE_PACK = 'EXTRA_LARGE_PACK';
    /** @var string This enumeration value indicates that the inventory item is a furniture item. */
    public const FURNITURE = 'FURNITURE';
    /** @var string This enumeration value indicates that the inventory item is an industry vehicle. */
    public const INDUSTRY_VEHICLES = 'INDUSTRY_VEHICLES';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a Canada Post large box. */
    public const LARGE_CANADA_POSTBOX = 'LARGE_CANADA_POSTBOX';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a Canada Post large bubble mailer. */
    public const LARGE_CANADA_POST_BUBBLE_MAILER = 'LARGE_CANADA_POST_BUBBLE_MAILER';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a large envelope. */
    public const LARGE_ENVELOPE = 'LARGE_ENVELOPE';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a standard mailing box. */
    public const MAILING_BOX = 'MAILING_BOX';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a medium Canada Post box. */
    public const MEDIUM_CANADA_POST_BOX = 'MEDIUM_CANADA_POST_BOX';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a medium Canada Post bubble mailer. */
    public const MEDIUM_CANADA_POST_BUBBLE_MAILER = 'MEDIUM_CANADA_POST_BUBBLE_MAILER';
    /** @var string This enumeration value indicates that the inventory item is a motorcycle. */
    public const MOTORBIKES = 'MOTORBIKES';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a one-way pallet. */
    public const ONE_WAY_PALLET = 'ONE_WAY_PALLET';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is an thick envelope. */
    public const PACKAGE_THICK_ENVELOPE = 'PACKAGE_THICK_ENVELOPE';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a padded bag. */
    public const PADDED_BAGS = 'PADDED_BAGS';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a parcel or a padded envelope. */
    public const PARCEL_OR_PADDED_ENVELOPE = 'PARCEL_OR_PADDED_ENVELOPE';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a roll. */
    public const ROLL = 'ROLL';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a small Canada Post box. */
    public const SMALL_CANADA_POST_BOX = 'SMALL_CANADA_POST_BOX';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a small Canada Post bubble mailer. */
    public const SMALL_CANADA_POST_BUBBLE_MAILER = 'SMALL_CANADA_POST_BUBBLE_MAILER';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a a tough bag. */
    public const TOUGH_BAGS = 'TOUGH_BAGS';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a UPS letter. */
    public const UPS_LETTER = 'UPS_LETTER';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a USPS flat-rate envelope. */
    public const USPS_FLAT_RATE_ENVELOPE = 'USPS_FLAT_RATE_ENVELOPE';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a USPS large pack. */
    public const USPS_LARGE_PACK = 'USPS_LARGE_PACK';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a USPS very large pack. */
    public const VERY_LARGE_PACK = 'VERY_LARGE_PACK';
    /** @var string This enumeration value indicates that the package type used to ship the inventory item is a wine pak. */
    public const WINE_PAK = 'WINE_PAK';
}
