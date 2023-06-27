<?php

namespace SapientPro\EbayInventorySDK\Enums;

enum WeightUnitOfMeasureEnum: string
{
    /** This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is pounds. */
    case POUND = 'POUND';

    /** This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is kilograms. */
    case KILOGRAM = 'KILOGRAM';

    /** This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is ounces. */
    case OUNCE = 'OUNCE';

    /** This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is grams. */
    case GRAM = 'GRAM';
}
