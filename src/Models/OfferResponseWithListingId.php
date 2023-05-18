<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used to indicate the status of each offer that the user attempted to publish. If an offer is successfully published, an eBay listing ID (also known as an Item ID) is returned. If there is an issue publishing the offer and creating the new eBay listing, the information about why the listing failed should be returned in the <strong>errors</strong> and/or <strong>warnings</strong> containers.
 */
class OfferResponseWithListingId implements EbayModelInterface
{
    /**
     * This container will be returned if there were one or more errors associated with publishing the offer.
     * @var Error[]
     */
    public array $errors;

    /** The unique identifier of the newly-created eBay listing. This field is only returned if the seller successfully published the offer and created the new eBay listing. */
    public string $listingId;

    /** The unique identifier of the offer that the seller published (or attempted to publish). */
    public string $offerId;

    /** The HTTP status code returned in this field indicates the success or failure of publishing the offer specified in the <strong>offerId</strong> field. See the <strong>HTTP status codes</strong> table to see which each status code indicates. */
    public int $statusCode;

    /**
     * This container will be returned if there were one or more warnings associated with publishing the offer.
     * @var Error[]
     */
    public array $warnings;
}
