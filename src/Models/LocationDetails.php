<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used by the <b>createInventoryLocation</b> call to provide an full or partial address of an inventory location.
 */
class LocationDetails implements EbayModelInterface
{
    use FillsModel;

    /**
     * The <b>address</b> container is required for a <b>createInventoryLocation</b> call. Except in the case of an inventory location that supports In-Store Pickup inventory, a full address is not a requirement when setting up an inventory location.
     * @var Address
     */
    public Address $address;

    /**
     * This container is used to set the Global Positioning System (GPS) latitude and longitude coordinates for the inventory location.<br><br>Geographical coordinates are required for the location of In-Store Pickup inventory.
     * @var GeoCoordinates
     */
    public GeoCoordinates $geoCoordinates;
}
