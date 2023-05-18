<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used to express the
 * Global Positioning System (GPS) latitude and longitude coordinates of an inventory location.
 */
class GeoCoordinates implements EbayModelInterface
{
    /** The latitude (North-South) component of the geographic coordinate. This field is required if a <strong>geoCoordinates</strong> container is used. <br><br>This field is returned if geographical coordinates are set for the inventory location.<br><br>For In-Store Pickup inventory, geographical coordinates are required. */
    public float $latitude;

    /** The longitude (East-West) component of the geographic coordinate. This field is required if a <strong>geoCoordinates</strong> container is used. <br><br>This field is returned if geographical coordinates are set for the inventory location.<br><br>For In-Store Pickup inventory, geographical coordinates are required. */
    public float $longitude;
}
