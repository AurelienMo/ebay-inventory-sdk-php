<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used by the <strong>offers</strong> container in a <strong>Bulk Update Price and Quantity</strong> call to update the current price and/or quantity of one or more offers associated with a specific inventory item.
 */
class OfferPriceQuantity implements EbayModelInterface
{
    use FillsModel;

    /** This field is used if the seller wants to modify the current quantity of the inventory item that will be available for purchase in the offer (identified by the corresponding <strong>offerId</strong> value). Either the <strong>availableQuantity</strong> field or the <strong>price</strong> container is required, but not necessarily both. */
    public int $availableQuantity;

    /** This field is the unique identifier of the offer. If an <strong>offers</strong> container is used to update one or more offers associated to a specific inventory item, the <strong>offerId</strong> value is required in order to identify the offer to update with a modified price and/or quantity.<br><br>The seller can run a <strong>getOffers</strong> call (passing in the correct SKU value as a query parameter) to retrieve <strong>offerId</strong> values for offers associated with the SKU. */
    public string $offerId;

    /**
     * This container is used if the seller wants to modify the current price of the inventory item. The dollar value set here will be the new price of the inventory item in the offer (identified by the corresponding <strong>offerId</strong> value). Either the <strong>availableQuantity</strong> field or the <strong>price</strong> container is required, but not necessarily both.
     * @var Amount
     */
    public Amount $price;
}
