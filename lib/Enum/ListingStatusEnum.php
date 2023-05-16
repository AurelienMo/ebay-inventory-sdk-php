<?php

namespace EBay\Inventory\Enum;

/**
 * This enumeration type is used to indicate the status of the eBay listing that is associated with the corresponding offer.
 */
final class ListingStatusEnum
{
    /** @var string This enumeration value indicates that the eBay listing associated with the offer is active. */
    public const ACTIVE = 'ACTIVE';
    /** @var string This enumeration value indicates that the eBay listing associated with the offer is still active, but that the product is currently out-of-stock. If a single-variation listing is out-of-stock, that listing will be kept alive but hidden from search. If a variation inside a multiple-variation listing is out-of-stock, only that variation is hidden, but the listing remains active and discoverable. */
    public const OUT_OF_STOCK = 'OUT_OF_STOCK';
    /** @var string This enumeration value indicates that the eBay listing associated with the offer is currently inactive. */
    public const INACTIVE = 'INACTIVE';
    /** @var string This enumeration value indicates that the eBay listing associated with the offer has ended. */
    public const ENDED = 'ENDED';
    /** @var string This enumeration value indicates that the eBay customer service has administratively ended the eBay listing associated with the offer. */
    public const EBAY_ENDED = 'EBAY_ENDED';
    /** @var string This enumeration value indicates that the eBay listing associated with the offer has yet to be listed. */
    public const NOT_LISTED = 'NOT_LISTED';
}
