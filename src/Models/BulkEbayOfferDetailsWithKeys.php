<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used by the base request of the <strong>bulkCreateOffer</strong> method,
 * which is used to create up to 25 new offers.
 */
class BulkEbayOfferDetailsWithKeys implements EbayModelInterface
{
    use FillsModel;

    /**
     * The details of each offer that is being created is passed in under this container.
     * Up to 25 offers can be created with one <strong>bulkCreateOffer</strong> call.
     * @var EbayOfferDetailsWithKeys[]
     */
    public ?array $requests;
}
