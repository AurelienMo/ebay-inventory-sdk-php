<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used by the base request of the <strong>bulkPublishOffer</strong> method,
 * which is used to publish up to 25 different offers.
 */
class BulkOffer implements EbayModelInterface
{
    /**
     * This container is used to pass in an array of offers to publish.
     * Up to 25 offers can be published with one <strong>bulkPublishOffer</strong> method.
     * @var OfferKeyWithId[]
     */
    public array $requests;
}
