<?php

namespace SapientPro\EbayInventorySDK\Enums;

enum DayOfWeekEnum: string
{
    /** This enumeration value indicates that the store is open on Monday for the hours specified through the operatingHours.intervals container. */
    case MONDAY = 'MONDAY';

    /** This enumeration value indicates that the store is open on Tuesday for the hours specified through the operatingHours.intervals container. */
    case TUESDAY = 'TUESDAY';

    /** This enumeration value indicates that the store is open on Wednesday for the hours specified through the operatingHours.intervals container. */
    case WEDNESDAY = 'WEDNESDAY';

    /** This enumeration value indicates that the store is open on Thursday for the hours specified through the operatingHours.intervals container. */
    case THURSDAY = 'THURSDAY';

    /** This enumeration value indicates that the store is open on Friday for the hours specified through the operatingHours.intervals container. */
    case FRIDAY = 'FRIDAY';

    /** This enumeration value indicates that the store is open on Saturday for the hours specified through the operatingHours.intervals container. */
    case SATURDAY = 'SATURDAY';

    /** This enumeration value indicates that the store is open on Sunday for the hours specified through the operatingHours.intervals container. */
    case SUNDAY = 'SUNDAY';
}
