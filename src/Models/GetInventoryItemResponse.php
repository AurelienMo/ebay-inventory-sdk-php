<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the response of the <strong>bulkGetInventoryItem</strong> method
 * to give the status of each inventory item record that the user tried to retrieve.
 */
class GetInventoryItemResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container will be returned if there were one or more errors
     * associated with retrieving the inventory item record.
     * @var Error[]|null
     */
    #[Assert\Type('array')]
    public ?array $errors = null;

    /**
     * This container consists of detailed information on the inventory item
     * specified in the <strong>sku</strong> field.
     * @var InventoryItemWithSkuLocaleGroupKeys
     */
    #[Assert\Type(InventoryItemWithSkuLocaleGroupKeys::class)]
    public InventoryItemWithSkuLocaleGroupKeys $inventoryItem;

    /** The seller-defined Stock-Keeping Unit (SKU) of the inventory item. The seller should have a unique SKU value for every product that they sell. */
    #[Assert\Type('string')]
    public string $sku;

    /** The HTTP status code returned in this field indicates the success or failure of retrieving the inventory item record for the inventory item specified in the <strong>sku</strong> field. See the <strong>HTTP status codes</strong> table to see which each status code indicates. */
    #[Assert\Type('int')]
    public int $statusCode;

    /**
     * This container will be returned if there were one or more warnings
     * associated with retrieving the inventory item record.
     * @var Error[]|null
     */
    #[Assert\Type('array')]
    public ?array $warnings = null;
}
