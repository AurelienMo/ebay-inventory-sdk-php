<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used to express the special operating hours of a store location on a specific date. A <strong>specialHours</strong> container is needed when the store's opening hours on a specific date are different than the normal operating hours on that particular day of the week.
 */
class SpecialHours implements EbayModelInterface
{
    /** A <strong>date</strong> value is required for each specific date that the store location has special operating hours.  <br><br>The timestamp is formatted as an <a href="https://www.iso.org/iso-8601-date-and-time-format.html " title="https://www.iso.org " target="_blank">ISO 8601</a> string, which is based on the 24-hour Coordinated Universal Time (UTC) clock.  <br><br><b>Format:</b> <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br><b>Example:</b> <code>2018-08-04T07:09:00.000Z</code> <br><br>This field is returned if set for the store location. */
    public string $date;

    /**
     * This container is used to define the opening and closing times of a store on a specific date (defined in the <strong>date</strong> field). An <strong>intervals</strong> container is needed for each specific date that the store has special operating hours. These special operating hours on the specific date override the normal operating hours for the specific day of the week. If a store location closes for lunch (or any other period during the day) and then reopens, multiple <strong>open</strong> and <strong>close</strong> pairs are needed. <br><br>This container is returned if set for the store location.
     * @var Interval[]
     */
    public array $intervals;
}
