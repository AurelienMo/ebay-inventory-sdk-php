<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * The seller-defined Stock-Keeping Unit (SKU) of each inventory item
 * that the user wants to retrieve is passed in the request of the <strong>bulkGetInventoryItem</strong> method.
 */
class GetInventoryItem implements EbayModelInterface
{
    use FillsModel;

    /** An array of SKU values are passed in under the <strong>sku</strong> container to retrieve up to 25 inventory item records. */
    public string $sku;
}
