<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to indicate the quantities of the inventory items that are reserved
 * for the different listing formats of the SKU offers.
 */
class FormatAllocation implements EbayModelInterface
{
    use FillsModel;

    /** This integer value indicates the quantity of the inventory item that is reserved for the published auction format offers of the SKU. */
    #[Assert\Type('int')]
    public ?int $auction = null;

    /** This integer value indicates the quantity of the inventory item that is available for the fixed-price offers of the SKU. */
    #[Assert\Type('int')]
    public ?int $fixedPrice = null;
}
