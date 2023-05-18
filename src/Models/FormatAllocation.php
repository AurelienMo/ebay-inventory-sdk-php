<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used to indicate the quantities of the inventory items that are reserved
 * for the different listing formats of the SKU offers.
 */
class FormatAllocation implements EbayModelInterface
{
    /** This integer value indicates the quantity of the inventory item that is reserved for the published auction format offers of the SKU. */
    public int $auction;

    /** This integer value indicates the quantity of the inventory item that is available for the fixed-price offers of the SKU. */
    public int $fixedPrice;
}
