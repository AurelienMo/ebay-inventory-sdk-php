<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base response of the <strong>bulkCreateOrReplaceInventoryItem</strong> method.
 */
class BulkInventoryItemResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This is the base container of the <strong>bulkCreateOrReplaceInventoryItem</strong> response.
     * The results of each attempted inventory item creation/update is captured under this container.
     * @var InventoryItemResponse[]
     */
    #[Assert\Type('array')]
    public array $responses;
}
