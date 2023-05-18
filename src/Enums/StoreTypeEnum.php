<?php

namespace SapientPro\EbayInventorySDK\Enums;

enum StoreTypeEnum: string
{
    /** This enumeration value indicates the inventory location is a merchant's store. */
    case STORE = 'STORE';

    /** This enumeration value indicates the inventory location is a merchant's warehouse. */
    case WAREHOUSE = 'WAREHOUSE';
}
