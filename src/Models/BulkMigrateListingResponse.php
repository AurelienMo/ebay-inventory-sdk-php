<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used by the response payload of the <strong>bulkMigrateListings</strong> call.
 */
class BulkMigrateListingResponse implements EbayModelInterface
{
    /**
     * This is the base container of the response payload of the <strong>bulkMigrateListings</strong> call.
     * The results of each attempted listing migration is captured under this container.
     * @var MigrateListingResponse[]
     */
    public array $responses;
}
