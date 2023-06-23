<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base response of the <strong>bulkCreateOffer</strong> method.
 */
class BulkOfferResponse implements EbayModelInterface
{
    use FillsModel;

    /** @var OfferSkuResponse[] */
    #[Assert\Type('array')]
    public array $responses;
}
