<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The base response of the <strong>withdrawOffer</strong> call.
 */
class WithdrawResponse implements EbayModelInterface
{
    use FillsModel;

    /** The unique identifier of the eBay listing associated with the offer that was withdrawn. This field will not be returned if the eBay listing was not successfully ended. */
    #[Assert\Type('string')]
    public ?string $listingId = null;

    /**
     * This container will be returned if there were one or more warnings associated with the attempt to withdraw the offer.
     * @var Error[]|null
     */
    #[Assert\Type('array')]
    public ?array $warnings = null;
}
