<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\LocaleEnum;
use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used by the response of the <strong>bulkCreateOrReplaceInventoryItem</strong> method
 * to indicate the success or failure of creating and/or updating each inventory item record.
 * The <strong>sku</strong> value in this type identifies each inventory item record.
 */
class InventoryItemResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container will be returned if there were one or more errors associated with the creation
     * or update to the inventory item record.
     * @var Error[]
     */
    public array $errors;

    /**
     * This field returns the natural language that was provided in the field values of the request payload
     * (i.e., en_AU, en_GB or de_DE). For implementation help, refer to
     * <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:LocaleEnum'>eBay API documentation</a>
     * @var LocaleEnum
     */
    public LocaleEnum $locale;

    /** The seller-defined Stock-Keeping Unit (SKU) of the inventory item. The seller should have a unique SKU value for every product that they sell. */
    public string $sku;

    /** The HTTP status code returned in this field indicates the success or failure of creating or updating the inventory item record for the inventory item indicated in the <strong>sku</strong> field. See the <strong>HTTP status codes</strong> table to see which each status code indicates. */
    public int $statusCode;

    /**
     * This container will be returned if there were one or more warnings associated with the creation
     * or update to the inventory item record.
     * @var Error[]
     */
    public array $warnings;
}
