<?php

namespace SapientPro\EbayInventorySDK\Enums;

enum ListingStatusEnum: string
{
    /** This enumeration value indicates that the eBay listing associated with the offer is active. */
    case ACTIVE = 'ACTIVE';

    /** This enumeration value indicates that the eBay listing associated with the offer is still active, but that the product is currently out-of-stock. If a single-variation listing is out-of-stock, that listing will be kept alive but hidden from search. If a variation inside a multiple-variation listing is out-of-stock, only that variation is hidden, but the listing remains active and discoverable. */
    case OUT_OF_STOCK = 'OUT_OF_STOCK';

    /** This enumeration value indicates that the eBay listing associated with the offer is currently inactive. */
    case INACTIVE = 'INACTIVE';

    /** This enumeration value indicates that the eBay listing associated with the offer has ended. */
    case ENDED = 'ENDED';

    /** This enumeration value indicates that the eBay customer service has administratively ended the eBay listing associated with the offer. */
    case EBAY_ENDED = 'EBAY_ENDED';

    /** This enumeration value indicates that the eBay listing associated with the offer has yet to be listed. */
    case NOT_LISTED = 'NOT_LISTED';
}
