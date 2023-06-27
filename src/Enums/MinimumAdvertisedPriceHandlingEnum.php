<?php

namespace SapientPro\EbayInventorySDK\Enums;

enum MinimumAdvertisedPriceHandlingEnum: string
{
    /** This enumeration value is used if the seller does not wish to include the Minimum Advertised Price in the offer. */
    case NONE = 'NONE';

    /** This enumeration value is used if the seller wish to dispay the Minimum Advertised Price to prospective buyers prior to checkout. */
    case PRE_CHECKOUT = 'PRE_CHECKOUT';

    /** This enumeration value is used if the seller wish to dispay the Minimum Advertised Price after the buyer already commits to buy the item. */
    case DURING_CHECKOUT = 'DURING_CHECKOUT';
}
