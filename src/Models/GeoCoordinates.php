<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to express the
 * Global Positioning System (GPS) latitude and longitude coordinates of an inventory location.
 */
class GeoCoordinates implements EbayModelInterface
{
    use FillsModel;

    /** The latitude (North-South) component of the geographic coordinate. This field is required if a <strong>geoCoordinates</strong> container is used. <br><br>This field is returned if geographical coordinates are set for the inventory location.<br><br>For In-Store Pickup inventory, geographical coordinates are required. */
    #[Assert\Type('float')]
    public ?float $latitude = null;

    /** The longitude (East-West) component of the geographic coordinate. This field is required if a <strong>geoCoordinates</strong> container is used. <br><br>This field is returned if geographical coordinates are set for the inventory location.<br><br>For In-Store Pickup inventory, geographical coordinates are required. */
    #[Assert\Type('float')]
    public ?float $longitude = null;
}
