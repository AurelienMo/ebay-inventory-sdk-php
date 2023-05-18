<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used by the base response of the <strong>bulkPublishOffer</strong> method.
 */
class BulkPublishResponse implements EbayModelInterface
{
    /**
     * A node is returned under the <strong>responses</strong> container
     * to indicate the success or failure of each offer that the seller was attempting to publish.
     * @var OfferResponseWithListingId[]
     */
    public array $responses;
}
