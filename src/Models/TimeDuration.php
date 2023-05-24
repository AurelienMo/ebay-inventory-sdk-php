<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\TimeDurationUnitEnum;

/**
 * This type is used to indicate the fulfillment time for an In-Store Pickup order, or for an order than will be shipped to the buyer.
 */
class TimeDuration implements EbayModelInterface
{
    /**
     * This enumeration value indicates the time unit used to specify the fulfillment time, such as <code>HOUR</code> or <code>BUSINESS_DAY</code>. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:TimeDurationUnitEnum'>eBay API documentation</a>
     *
     * @var TimeDurationUnitEnum|null
     */
    public ?TimeDurationUnitEnum $unit;

    /** The integer value in this field, along with the time unit in the <strong>unit</strong> field, will indicate the fulfillment time.<br><br> For In-Store Pickup orders, this value will indicate how soon after an In-Store Pickup purchase can the buyer pick up the item at the designated store location. If the value of this field is <code>4</code>, and the value of the <strong>unit</strong> field is <code>HOUR</code>, then the fulfillment time for the In-Store Pickup order is four hours, which means that the buyer will be able to pick up the item at the store four hours after the transaction took place.<br><br> For standard orders that will be shipped, this value will indicate the expected fulfillment time if the inventory item is shipped from the inventory location. If the value of this field is <code>4</code>, and the value of the <strong>unit</strong> field is <code>BUSINESS_DAY</code>, then the estimated delivery date after purchase is 4 business days. */
    public ?int $value;
}
