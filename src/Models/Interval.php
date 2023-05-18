<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used by the <strong>intervals</strong> container to define
 * the opening and closing times of a store's working day.
 * Local time (in Military format) is used, with the following format: <code>hh:mm:ss</code>.
 */
class Interval implements EbayModelInterface
{
    /** The <strong>close</strong> value is actually the time that the store closes. Local time (in Military format) is used. So, if a store closed at 8 PM local time, the <strong>close</strong> time would look like the following: <code>20:00:00</code>. This field is conditionally required if the <strong>intervals</strong> container is used to specify working hours or special hours for a store. <br><br>This field is returned if set for the store location. */
    public string $close;

    /** The <strong>open</strong> value is actually the time that the store opens. Local time (in Military format) is used. So, if a store opens at 9 AM local time, the <strong>close</strong> time would look like the following: <code>09:00:00</code>. This field is conditionally required if the <strong>intervals</strong> container is used to specify working hours or special hours for a store. <br><br>This field is returned if set for the store location. */
    public string $open;
}
