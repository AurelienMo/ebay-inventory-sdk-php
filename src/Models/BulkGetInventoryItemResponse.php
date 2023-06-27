<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base response of the <strong>bulkGetInventoryItem</strong> method.
 */
class BulkGetInventoryItemResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This is the base container of the <strong>bulkGetInventoryItem</strong> response.
     * The results of each attempted inventory item retrieval is captured under this container.
     * @var GetInventoryItemResponse[]
     */
    #[Assert\Type('array')]
    public array $responses;
}
