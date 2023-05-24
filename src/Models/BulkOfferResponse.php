<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used by the base response of the <strong>bulkCreateOffer</strong> method.
 */
class BulkOfferResponse implements EbayModelInterface
{
    use FillsModel;

    /** @var OfferSkuResponse[] */
    public array $responses;
}
