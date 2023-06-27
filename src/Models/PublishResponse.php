<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base response payload of the <strong>publishOffer</strong> and <strong>publishOfferByInventoryItemGroup</strong> calls.
 */
class PublishResponse implements EbayModelInterface
{
    use FillsModel;

    /** The unique identifier of the newly created eBay listing. This field is returned if the single offer (if <strong>publishOffer</strong> call was used) or group of offers in an inventory item group (if <strong>publishOfferByInventoryItemGroup</strong> call was used) was successfully converted into an eBay listing. */
    #[Assert\Type('string')]
    public ?string $listingId = null;

    /**
     * This container will contain an array of errors and/or warnings if any occur when a <strong>publishOffer</strong> or <strong>publishOfferByInventoryItemGroup</strong> call is made.
     * @var Error[]|null
     */
    #[Assert\Type('array')]
    public ?array $warnings = null;
}
