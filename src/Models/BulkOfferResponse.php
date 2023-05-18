<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used by the base response of the <strong>bulkCreateOffer</strong> method.
 */
class BulkOfferResponse implements EbayModelInterface
{
    /** @var OfferSkuResponse[] */
    public array $responses;
}
