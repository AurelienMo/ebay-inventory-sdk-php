<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used by the base response of the <strong>bulkCreateOrReplaceInventoryItem</strong> method.
 */
class BulkInventoryItemResponse implements EbayModelInterface
{
    /**
     * This is the base container of the <strong>bulkCreateOrReplaceInventoryItem</strong> response.
     * The results of each attempted inventory item creation/update is captured under this container.
     * @var InventoryItemResponse[]
     */
    public array $responses;
}
