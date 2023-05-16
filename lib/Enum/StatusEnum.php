<?php

namespace EBay\Inventory\Enum;

/**
 * An enumerated type defining the possible states of an inventory location.
 */
final class StatusEnum
{
    /** @var string This enumeration value indicates that an inventory location is disabled (inventory can not be loaded to location). */
    public const DISABLED = 'DISABLED';
    /** @var string This enumeration value indicates that an inventory location is disabled (inventory can be loaded to location). */
    public const ENABLED = 'ENABLED';
}
