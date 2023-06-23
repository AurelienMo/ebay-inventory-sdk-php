<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base request payload of the <strong>getListingFees</strong> call.
 */
class OfferKeysWithId implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container is used to identify one or more (up to 250)unpublished offers for which expected listing fees will be retrieved. The user passes one or more <strong>offerId</strong> values (maximum of 250) in to this container to identify the unpublished offers in which to retrieve expected listing fees. This call is only applicable for offers in the unpublished state. <br><br> The call response gives aggregate fee amounts per eBay marketplace, and does not give fee information at the individual offer level.
     * @var OfferKeyWithId[]
     */
    #[Assert\Type('array')]
    public array $offers;
}
