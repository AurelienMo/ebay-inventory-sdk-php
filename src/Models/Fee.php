<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used to express expected listing fees that the seller may incur for one or more unpublished offers,
 * as well as any eBay-related promotional discounts being applied toward a specific fee.
 * These fees are the expected cumulative fees per eBay marketplace
 * (which is indicated in the <strong>marketplaceId</strong> field).
 */
class Fee implements EbayModelInterface
{
    use FillsModel;

    /**
     * This dollar value in this container is the
     * actual dollar value of the listing fee type specified in the <strong>feeType</strong> field.
     * @var Amount|null
     */
    public ?Amount $amount;

    /** The value returned in this field indicates the type of listing fee that the seller may incur if one or more unpublished offers (offers are specified in the call request) are published on the marketplace specified in the <strong>marketplaceId</strong> field. Applicable listing fees will often include things such as <code>InsertionFee</code> or <code>SubtitleFee</code>, but many fee types will get returned even when they are <code>0.0</code>.<br><br>See the <a href="https://pages.ebay.com/help/sell/fees.html " target="_blank">Standard selling fees</a> help page for more information on listing fees. */
    public string $feeType;

    /**
     * The dollar value in this container indicates any eBay promotional discount
     * applied toward the listing fee type specified in the <strong>feeType</strong> field.
     * If there was no discount applied toward the fee,
     * this container is still returned but its value is <code>0.0</code>.
     * @var Amount|null
     */
    public ?Amount $promotionalDiscount;
}
