<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to set the available quantity of the inventory item at one or more warehouse locations.
 */
class AvailabilityDistribution implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container is used to indicate the expected fulfillment time
     * if the inventory item is shipped from the warehouse location
     * identified in the corresponding <strong>merchantLocationKey</strong> field.
     * The fulfillment time is the estimated number of business days after purchase
     * that the buyer can expect the item to be delivered.<br><br>
     * This field is optional, and is used by eBay to provide the estimated delivery date to buyers.
     * This field is returned if set for the inventory item.
     * @var TimeDuration|null
     */
    #[Assert\Type(TimeDuration::class)]
    public ?TimeDuration $fulfillmentTime = null;

    /** The unique identifier of an inventory location where quantity is available for the inventory item. This field is conditionally required to identify the inventory location that has quantity of the inventory item. */
    #[Assert\Type('string')]
    public ?string $merchantLocationKey = null;

    /** The integer value passed into this field indicates the quantity of the inventory item that is available at this inventory location. This field is conditionally required. */
    #[Assert\Type('int')]
    public ?int $quantity = null;
}
