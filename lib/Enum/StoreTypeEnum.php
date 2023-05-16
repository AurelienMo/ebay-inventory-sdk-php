<?php

namespace EBay\Inventory\Enum;

/**
 * An enumerated type defining the inventory location types.
 */
final class StoreTypeEnum
{
    /** @var string This enumeration value indicates the inventory location is a merchant's store. */
    public const STORE = 'STORE';
    /** @var string This enumeration value indicates the inventory location is a merchant's warehouse. */
    public const WAREHOUSE = 'WAREHOUSE';
}
