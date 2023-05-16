<?php

namespace EBay\Inventory\Enum;

/**
 * This enumeration type is used to specify/indicate the unit of measurement with which the dimensions of the shipping package are being measured.
 */
final class LengthUnitOfMeasureEnum
{
    /** @var string This enumeration value indicates that the dimensions of the shipping package is being measured in inches. */
    public const INCH = 'INCH';
    /** @var string This enumeration value indicates that the dimensions of the shipping package is being measured in feet. */
    public const FEET = 'FEET';
    /** @var string This enumeration value indicates that the dimensions of the shipping package is being measured in centimeters. */
    public const CENTIMETER = 'CENTIMETER';
    /** @var string This enumeration value indicates that the dimensions of the shipping package is being measured in meters. */
    public const METER = 'METER';
}
