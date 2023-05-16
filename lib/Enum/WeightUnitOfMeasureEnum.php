<?php

namespace EBay\Inventory\Enum;

/**
 * This enumerated type is used to indicate what unit of measurement is used to measure the weight of a shipping package.
 * The weight and dimensions of a shipping package are generally required when calculated shipping rates are used,
 * and weight is required if flat-rate shipping is used, but the seller is charging a weight surcharge.
 */
final class WeightUnitOfMeasureEnum
{
    /** @var string This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is pounds. */
    public const POUND = 'POUND';
    /** @var string This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is kilograms. */
    public const KILOGRAM = 'KILOGRAM';
    /** @var string This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is ounces. */
    public const OUNCE = 'OUNCE';
    /** @var string This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is grams. */
    public const GRAM = 'GRAM';
}
