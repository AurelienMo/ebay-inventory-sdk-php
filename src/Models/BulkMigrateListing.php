<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used by the base container of the <strong>bulkMigrateListings</strong> request payload.
 */
class BulkMigrateListing implements EbayModelInterface
{
    /**
     * This is the base container of the <strong>bulkMigrateListings</strong> request payload.
     * One to five eBay listings will be included under this container.
     * @var MigrateListing[]
     */
    public array $requests;
}
