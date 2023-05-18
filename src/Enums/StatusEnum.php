<?php

namespace SapientPro\EbayInventorySDK\Enums;

enum StatusEnum: string
{
    /** This enumeration value indicates that an inventory location is disabled (inventory can not be loaded to location). */
    case DISABLED = 'DISABLED';

    /** This enumeration value indicates that an inventory location is disabled (inventory can be loaded to location). */
    case ENABLED = 'ENABLED';
}
