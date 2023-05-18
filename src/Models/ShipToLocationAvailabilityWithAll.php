<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used to specify the total 'ship-to-home' quantity of the inventory items that will be available for purchase through one or more published offers.
 */
class ShipToLocationAvailabilityWithAll implements EbayModelInterface
{
    /**
     * This container is used to specify the quantity of the inventory item that is available for purchase, allocated by the offer types.
     * @var FormatAllocation
     */
    public FormatAllocation $allocationByFormat;

    /**
     * This container is used to set the available quantity of the inventory item at one or more warehouse locations.<br><br> This container will be returned if the available quantity is set for one or more inventory locations.
     * @var AvailabilityDistribution[]
     */
    public array $availabilityDistributions;

    /** This container is used to set the total 'ship-to-home' quantity of the inventory item that will be available for purchase through one or more published offers. This container is not immediately required, but 'ship-to-home' quantity must be set before an offer of the inventory item can be published.<br><br>If an existing inventory item is being updated, and the 'ship-to-home' quantity already exists for the inventory item record, this container should be included again, even if the value is not changing, or the available quantity data will be lost. */
    public int $quantity;
}
