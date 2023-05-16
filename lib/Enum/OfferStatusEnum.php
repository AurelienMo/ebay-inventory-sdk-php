<?php

namespace EBay\Inventory\Enum;

/**
 * This enumeration type is used to indicate the current status of the offer (published or unpublished).
 */
final class OfferStatusEnum
{
    /** @var string This enumeration value indicates that the offer is in the published state, and is a part of a single or multiple-variation eBay listing. For published offers, more information on the eBay listing, including the listing ID and the listing status, can be found in the listing container. */
    public const PUBLISHED = 'PUBLISHED';
    /** @var string This enumeration value indicates that the offer is in the unpublished state, and has yet to be converted to an active eBay listing. */
    public const UNPUBLISHED = 'UNPUBLISHED';
}
