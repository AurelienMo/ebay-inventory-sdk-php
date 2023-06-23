<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the response payload of the <strong>bulkMigrateListings</strong> call.
 */
class BulkMigrateListingResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This is the base container of the response payload of the <strong>bulkMigrateListings</strong> call.
     * The results of each attempted listing migration is captured under this container.
     * @var MigrateListingResponse[]
     */
    #[Assert\Type('array')]
    public array $responses;
}
