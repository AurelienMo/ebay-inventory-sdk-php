<?php

namespace EBay\Inventory\Enum;

/**
 * An enumerated type defining the days of the week.
 * This type is used by the dayOfWeekEnum field under the operatingHours container to indicate which days a merchant's store is open to pick up In-Store Pickup or Click and Collect orders.
 */
final class DayOfWeekEnum
{
    /** @var string This enumeration value indicates that the store is open on Monday for the hours specified through the operatingHours.intervals container. */
    public const MONDAY = 'MONDAY';
    /** @var string This enumeration value indicates that the store is open on Tuesday for the hours specified through the operatingHours.intervals container. */
    public const TUESDAY = 'TUESDAY';
    /** @var string This enumeration value indicates that the store is open on Wednesday for the hours specified through the operatingHours.intervals container. */
    public const WEDNESDAY = 'WEDNESDAY';
    /** @var string This enumeration value indicates that the store is open on Thursday for the hours specified through the operatingHours.intervals container. */
    public const THURSDAY = 'THURSDAY';
    /** @var string This enumeration value indicates that the store is open on Friday for the hours specified through the operatingHours.intervals container. */
    public const FRIDAY = 'FRIDAY';
    /** @var string This enumeration value indicates that the store is open on Saturday for the hours specified through the operatingHours.intervals container. */
    public const SATURDAY = 'SATURDAY';
    /** @var string This enumeration value indicates that the store is open on Sunday for the hours specified through the operatingHours.intervals container. */
    public const SUNDAY = 'SUNDAY';
}
