<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to update the total "ship-to-home"  quantity for one or more inventory items and/or to update the price and/or quantity of one or more specific offers associated with one or more inventory items.
 */
class PriceQuantity implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container is needed if the seller is updating the price and/or quantity of one or more published offers, and a successful call will actually update the active eBay listing with the revised price and/or available quantity.<br><br>This call is not designed to work with unpublished offers. For unpublished offers, the seller should use the <strong>updateOffer</strong> call to update the available quantity and/or price.<br><br> If the seller is also using the <strong>shipToLocationAvailability</strong> container and <strong>sku</strong> field to update the total 'ship-to-home' quantity of the inventory item, the SKU value associated with the corresponding <strong>offerId</strong> value(s) must be the same as the corresponding <strong>sku</strong> value that is passed in, or an error will occur.<br><br>A separate (<strong>OfferPriceQuantity</strong>) node is required for each offer being updated.
     * @var OfferPriceQuantity[]
     */
    #[Assert\Type('array')]
    public ?array $offers = null;

    /**
     * This container is needed if the seller is updating the total 'ship-to-home' quantity for the corresponding inventory item (specified in the <strong>sku</strong> field. A successful call will update the inventory item record associated with the <strong>sku</strong> value.
     * @var ShipToLocationAvailability|null
     */
    #[Assert\Type(ShipToLocationAvailability::class)]
    public ?ShipToLocationAvailability $shipToLocationAvailability = null;

    /** This is the seller-defined SKU value of the inventory item whose total 'ship-to-home' quantity will be updated. This field is only required when the seller is updating the total quantity of an inventory item using the <strong>shipToLocationAvailability</strong> container. If the seller is updating the price and/or quantity of one or more specific offers, one or more <strong>offerId</strong> values are used instead, and the <strong>sku</strong> value is not needed.<br><br>If the seller wants to update the price and/or quantity of one or more offers, and also wants to update the total 'ship-to-home' quantity of the corresponding inventory item, the SKU value associated with the <strong>offerId</strong> value(s) must be the same as the corresponding <strong>sku</strong> value that is passed in, or an error will occur.<br><br><strong>Max Length</strong>: 50<br> */
    #[Assert\Type('string')]
    public ?string $sku = null;
}
