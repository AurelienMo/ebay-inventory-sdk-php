<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\ListingStatusEnum;
use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the <strong>listing</strong> container in the <strong>getOffer</strong> and
 * <strong>getOffers</strong> calls to provide the eBay listing ID, the listing status, and quantity
 * sold for the offer. The <strong>listing</strong> container is only returned for published offers,
 * and is not returned for unpublished offers.
 */
class ListingDetails implements EbayModelInterface
{
    use FillsModel;

    /** The unique identifier of the eBay listing that is associated with the published offer. */
    #[Assert\Type('string')]
    public ?string $listingId = null;

    /**
     * The enumeration value returned in this field indicates the status of the listing that is associated
     * with the published offer.
     *
     * For implementation help, refer to
     * <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:ListingStatusEnum'>eBay API documentation</a>
     *
     * @var ListingStatusEnum|null
     */
    #[Assert\Type(ListingStatusEnum::class)]
    public ?ListingStatusEnum $listingStatus = null;

    /** This integer value indicates the quantity of the product that has been sold for the published offer. */
    #[Assert\Type('int')]
    public ?int $soldQuantity = null;
}
