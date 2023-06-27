<?php

namespace SapientPro\EbayInventorySDK\Enums;

enum ListingDurationEnum: string
{
    /** This enum value indicates that the auction listing offer is valid for 1 day, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. */
    case DAYS_1 = 'DAYS_1';

    /** This enum value indicates that the auction listing offer is valid for 3 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. */
    case DAYS_3 = 'DAYS_3';

    /** This enum value indicates that the auction listing offer is valid for 5 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. */
    case DAYS_5 = 'DAYS_5';

    /** This enum value indicates that the auction listing offer is valid for 7 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. */
    case DAYS_7 = 'DAYS_7';

    /** This enum value indicates that the auction listing offer is valid for 10 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. */
    case DAYS_10 = 'DAYS_10';

    /** This enum value indicates that the auction listing offer is valid for 21 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. */
    case DAYS_21 = 'DAYS_21';

    /** This enum value indicates that the auction listing offer is valid for 30 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. */
    case DAYS_30 = 'DAYS_30';

    /** This enum value indicates that the listing is a fixed-price offer. 'GTC' stands for Good 'Til Cancelled, which means that a fixed-price listing will remain active until the seller cancels/ends the listing. 'GTC' listings are automatically renewed every calendar month. */
    case GTC = 'GTC';
}
