<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\AvailabilityTypeEnum;
use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to specify/indicate the quantity of the inventory item that is available for an In-Store Pickup order at the merchant's physical store (specified by the <strong>merchantLocationKey</strong> field).
 */
class PickupAtLocationAvailability implements EbayModelInterface
{
    use FillsModel;

    /**
     * The enumeration value in this field indicates the availability status of the inventory item at the merchant's physical store specified by the <strong>pickupAtLocationAvailability.merchantLocationKey</strong> field. This field is required if the <strong>pickupAtLocationAvailability</strong> container is used, and is always returned with the <strong>pickupAtLocationAvailability</strong> container.  <br><br> See <a href="/api-docs/sell/inventory/types/slr:AvailabilityTypeEnum" target="_blank">AvailabilityTypeEnum</a> for more information about how/when you use each enumeration value. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:AvailabilityTypeEnum'>eBay API documentation</a>
     * @var AvailabilityTypeEnum|null
     */
    #[Assert\Type(AvailabilityTypeEnum::class)]
    public ?AvailabilityTypeEnum $availabilityType = null;

    /**
     * This container is used to indicate how soon an In-Store Pickup order will be available for pickup by the buyer after the order takes place. This container is required if the <strong>pickupAtLocationAvailability</strong> container is used, and is always returned with the <strong>pickupAtLocationAvailability</strong> container.
     * @var TimeDuration|null
     */
    #[Assert\Type(TimeDuration::class)]
    public ?TimeDuration $fulfillmentTime = null;

    /** The unique identifier of a merchant's store where the In-Store Pickup inventory item is currently located, or where inventory will be sent to. If the merchant's store is currently awaiting for inventory, the <strong>availabilityType</strong> value should be <code>SHIP_TO_STORE</code>. This field is required if the <strong>pickupAtLocationAvailability</strong> container is used, and is always returned with the <strong>pickupAtLocationAvailability</strong> container.<br> <br><b>Max length</b>: 36 */
    #[Assert\Type('string')]
    public ?string $merchantLocationKey = null;

    /** This integer value indicates the quantity of the inventory item that is available for In-Store Pickup at the store identified by the  <strong>merchantLocationKey</strong> value.  The value of <strong>quantity</strong> should be an integer value greater than <code>0</code>, unless the inventory item is out of stock. This field is required if the <strong>pickupAtLocationAvailability</strong> container is used, and is always returned with the <strong>pickupAtLocationAvailability</strong> container. */
    #[Assert\Type('int')]
    public ?int $quantity = null;
}
