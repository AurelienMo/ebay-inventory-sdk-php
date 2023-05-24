<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used by the base request payload of the <strong>bulkUpdatePriceQuantity</strong> call.
 * The <strong>bulkUpdatePriceQuantity</strong> call allows the seller to update the total 'ship-to-home' quantity of
 * one or more inventory items (up to 25) and/or
 * to update the price and/or quantity of one or more specific published offers.
 */
class BulkPriceQuantity implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container is used by the seller to update the total 'ship-to-home' quantity of one or more inventory items
     * (up to 25) and/or to update the price and/or quantity of one or more specific published offers.
     * @var PriceQuantity[]
     */
    public array $requests;
}
