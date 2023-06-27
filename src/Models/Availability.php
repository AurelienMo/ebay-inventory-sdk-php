<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to specify the quantity of the inventory item
 * that is available for purchase if the item will be shipped to the buyer,
 * and the quantity of the inventory item that is available for
 * In-Store Pickup at one or more of the merchant's physical stores.
 * In-Store Pickup is only available to large merchants selling on the US, UK, Germany, and Australia sites.
 */
class Availability implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container consists of an array of one or more of the merchant's physical store locations
     * where the inventory item is available for In-Store Pickup orders.
     * The merchant's location, the quantity available, and the fulfillment time
     * (how soon the item will be ready for pickup after the order takes place) are all in this container.
     * In-Store Pickup is only available to large merchants selling on the US, UK, Germany, and Australia sites.
     * @var PickupAtLocationAvailability[]
     */
    #[Assert\Type('array')]
    public ?array $pickupAtLocationAvailability = null;

    /**
     * This container specifies the quantity of the inventory item
     * that are available for purchase across one or more eBay marketplaces.
     * @var ShipToLocationAvailability|null
     */
    #[Assert\Type(ShipToLocationAvailability::class)]
    public ?ShipToLocationAvailability $shipToLocationAvailability = null;
}
