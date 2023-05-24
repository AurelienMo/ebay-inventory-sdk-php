<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used by the base response payload for the <strong>getInventoryLocations</strong> call.
 */
class LocationResponse implements EbayModelInterface
{
    use FillsModel;

    /** The URI of the current page of results from the result set. */
    public string $href;

    /** The number of items returned on a single page from the result set. */
    public int $limit;

    /** The URI for the following page of results. This value is returned only if there is an additional page of results to display from the result set. <br><br><b>Max length</b>: 2048 */
    public string $next;

    /** The number of results skipped in the result set before listing the first returned result. This value is set in the request with the <b>offset</b> query parameter. <p class="tablenote"><strong>Note: </strong>The items in a paginated result set use a zero-based list where the first item in the list has an offset of <code>0</code>.</p> */
    public int $offset;

    /** The URI for the preceding page of results. This value is returned only if there is a previous page of results to display from the result set. <br><br><b>Max length</b>: 2048 */
    public string $prev;

    /** The total number of items retrieved in the result set.  <br><br>If no items are found, this field is returned with a value of <code>0</code>. */
    public int $total;

    /**
     * An array of one or more of the merchant's inventory locations.
     * @var InventoryLocationResponse[]
     */
    public array $locations;
}
