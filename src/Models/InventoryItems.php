<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base response payload of <strong>getInventoryItems</strong> call.
 */
class InventoryItems implements EbayModelInterface
{
    use FillsModel;

    /** This is the URL to the current page of inventory items. */
    #[Assert\Type('string')]
    public string $href;

    /**
     * This container is an array of one or more inventory items, with detailed information on each inventory item.
     * @var InventoryItemWithSkuLocaleGroupId[]
     */
    #[Assert\Type('array')]
    public array $inventoryItems;

    /** This integer value is the number of inventory items that will be displayed on each results page. */
    #[Assert\Type('int')]
    public int $limit;

    /** This is the URL to the next page of inventory items. This field will only be returned if there are additional inventory items to view. */
    #[Assert\Type('string')]
    public string $next;

    /** This is the URL to the previous page of inventory items. This field will only be returned if there are previous inventory items to view. */
    #[Assert\Type('string')]
    public string $prev;

    /** This integer value indicates the total number of pages of results that are available. This number will depend on the total number of inventory items available for viewing, and on the <strong>limit</strong> value. */
    #[Assert\Type('int')]
    public int $size;

    /** This integer value is the total number of inventory items that exist for the seller's account. Based on this number and on the <strong>limit</strong> value, the seller may have to toggle through multiple pages to view all inventory items. */
    #[Assert\Type('int')]
    public int $total;
}
