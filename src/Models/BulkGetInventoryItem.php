<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used by the base request of the <strong>bulkGetInventoryItem</strong> method.
 */
class BulkGetInventoryItem implements EbayModelInterface
{
    /**
     * The seller passes in multiple SKU values under this container to retrieve multiple inventory item records.
     * Up to 25 inventory item records can be retrieved at one time.
     * @var GetInventoryItem[]
     */
    public array $requests;
}
