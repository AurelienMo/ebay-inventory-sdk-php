<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\DayOfWeekEnum;

/**
 * This type is used to express the regular operating hours of a merchant's store during the days of the week.
 */
class OperatingHours implements EbayModelInterface
{
    /**
     * A <strong>dayOfWeekEnum</strong> value is required for each day of the week that the store location has regular operating hours. <br><br>This field is returned if operating hours are defined for the store location. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/inventory/types/api:DayOfWeekEnum'>eBay API documentation</a>
     *
     * @var DayOfWeekEnum
     */
    public DayOfWeekEnum $dayOfWeekEnum;

    /**
     * This container is used to define the opening and closing times of a store's working day (defined in the <strong>dayOfWeekEnum</strong> field). An <strong>intervals</strong> container is needed for each day of the week that the store location is open. If a store location closes for lunch (or any other period during the day) and then reopens, multiple <strong>open</strong> and <strong>close</strong> pairs are needed <br><br>This container is returned if operating hours are defined for the store location.
     * @var Interval[]
     */
    public array $intervals;
}
