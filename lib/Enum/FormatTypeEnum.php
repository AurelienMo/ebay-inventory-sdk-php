<?php

namespace EBay\Inventory\Enum;

/**
 * This enumeration type is used to indicate the listing format of the offer.
 */
final class FormatTypeEnum
{
    /** @var string This enumeration value indicates that the listing format of the offer is auction. */
    public const AUCTION = 'AUCTION';
    /** @var string This enumeration value indicates that the listing format of the offer is fixed-price. */
    public const FIXED_PRICE = 'FIXED_PRICE';
}
