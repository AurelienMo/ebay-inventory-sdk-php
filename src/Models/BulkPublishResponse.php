<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base response of the <strong>bulkPublishOffer</strong> method.
 */
class BulkPublishResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * A node is returned under the <strong>responses</strong> container
     * to indicate the success or failure of each offer that the seller was attempting to publish.
     * @var OfferResponseWithListingId[]
     */
    #[Assert\Type('array')]
    public array $responses;
}
