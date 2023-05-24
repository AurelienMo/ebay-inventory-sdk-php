<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is use by the base response payload of the <strong>bulkUpdatePriceQuantity</strong> call.
 * The <strong>bulkUpdatePriceQuantity</strong> call response will return
 * an HTTP status code, offer ID, and SKU value for each offer/inventory item being updated,
 * as well as an <strong>errors</strong> and/or <strong>warnings</strong> container
 * if any errors or warnings are triggered while trying to update those offers/inventory items.
 */
class BulkPriceQuantityResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container will return an HTTP status code, offer ID, and SKU value
     * for each offer/inventory item being updated,
     * as well as an <strong>errors</strong> and/or <strong>warnings</strong> container
     * if any errors or warnings are triggered while trying to update those offers/inventory items.
     * @var PriceQuantityResponse[]
     */
    public array $responses;
}
