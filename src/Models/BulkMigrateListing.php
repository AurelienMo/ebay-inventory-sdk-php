<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used by the base container of the <strong>bulkMigrateListings</strong> request payload.
 */
class BulkMigrateListing implements EbayModelInterface
{
    use FillsModel;

    /**
     * This is the base container of the <strong>bulkMigrateListings</strong> request payload.
     * One to five eBay listings will be included under this container.
     * @var MigrateListing[]
     */
    public array $requests;
}
