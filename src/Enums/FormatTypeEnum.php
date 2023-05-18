<?php

namespace SapientPro\EbayInventorySDK\Enums;

enum FormatTypeEnum: string
{
    /** This enumeration value indicates that the listing format of the offer is auction. */
    case AUCTION = 'AUCTION';

    /** This enumeration value indicates that the listing format of the offer is fixed-price. */
    case FIXED_PRICE = 'FIXED_PRICE';
}
