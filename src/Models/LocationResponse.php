<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base response payload for the <strong>getInventoryLocations</strong> call.
 */
class LocationResponse implements EbayModelInterface
{
    use FillsModel;

    /** The URI of the current page of results from the result set. */
    #[Assert\Type('string')]
    public ?string $href = null;

    /** The number of items returned on a single page from the result set. */
    #[Assert\Type('int')]
    public ?int $limit = null;

    /** The URI for the following page of results. This value is returned only if there is an additional page of results to display from the result set. <br><br><b>Max length</b>: 2048 */
    #[Assert\Type('string')]
    public ?string $next = null;

    /** The number of results skipped in the result set before listing the first returned result. This value is set in the request with the <b>offset</b> query parameter. <p class="tablenote"><strong>Note: </strong>The items in a paginated result set use a zero-based list where the first item in the list has an offset of <code>0</code>.</p> */
    #[Assert\Type('int')]
    public ?int $offset = null;

    /** The URI for the preceding page of results. This value is returned only if there is a previous page of results to display from the result set. <br><br><b>Max length</b>: 2048 */
    #[Assert\Type('string')]
    public ?string $prev = null;

    /** The total number of items retrieved in the result set.  <br><br>If no items are found, this field is returned with a value of <code>0</code>. */
    #[Assert\Type('int')]
    public ?int $total = null;

    /**
     * An array of one or more of the merchant's inventory locations.
     * @var InventoryLocationResponse[]
     */
    #[Assert\Type('array')]
    public ?array $locations = null;
}
