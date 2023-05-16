<?php

namespace EBay\Inventory\Enum;

/**
 * This type is used to control how/when the Minimum Advertised Price is shown for an offer.
 * The Minimum Advertised Price (MAP) feature is only available on the US site.
 */
final class MinimumAdvertisedPriceHandlingEnum
{
    /** @var string This enumeration value is used if the seller does not wish to include the Minimum Advertised Price in the offer. */
    public const NONE = 'NONE';
    /** @var string This enumeration value is used if the seller wish to dispay the Minimum Advertised Price to prospective buyers prior to checkout. */
    public const PRE_CHECKOUT = 'PRE_CHECKOUT';
    /** @var string This enumeration value is used if the seller wish to dispay the Minimum Advertised Price after the buyer already commits to buy the item. */
    public const DURING_CHECKOUT = 'DURING_CHECKOUT';
}
