<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base response payload for the <strong>getListingFees</strong> call.
 */
class FeesSummaryResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container consists of an array of one or more listing fees that the seller can expect to pay
     * for unpublished offers specified in the call request.
     * Many fee types will get returned even when they are <code>0.0</code>.
     * @var FeeSummary[]
     */
    #[Assert\Type('array')]
    public array $feeSummaries;
}
