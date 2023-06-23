<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\FormatTypeEnum;
use SapientPro\EbayInventorySDK\Enums\ListingDurationEnum;
use SapientPro\EbayInventorySDK\Enums\MarketplaceEnum;
use SapientPro\EbayInventorySDK\Enums\OfferStatusEnum;
use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type provides details of an offer,
 * and is used by the response payloads of the <strong>getOffer</strong> and the <strong>getOffers</strong> calls.
 */
class EbayOfferDetailsWithAll implements EbayModelInterface
{
    use FillsModel;

    /** This integer value indicates the quantity of the inventory item (specified by the <strong>sku</strong> value) that will be available for purchase by buyers shopping on the eBay site specified in the <strong>marketplaceId</strong> field. For unpublished offers where the available quantity has yet to be set, the <strong>availableQuantity</strong> value is set to <code>0</code>. */
    #[Assert\Type('int')]
    public int $availableQuantity;

    /** The unique identifier of the primary eBay category that the inventory item is listed under. This field is always returned for published offers, but is only returned if set for unpublished offers. */
    #[Assert\Type('string')]
    public ?string $categoryId = null;

    /**
     * This container is returned if a charitable organization will receive
     * a percentage of sale proceeds for each sale generated by the listing.
     * This container consists of the <strong>charityId</strong> field to identify the charitable organization,
     * and the <strong>donationPercentage</strong> field that indicates the percentage of the sales proceeds
     * that will be donated to the charitable organization.
     * @var Charity|null
     */
    #[Assert\Type(Charity::class)]
    public ?Charity $charity = null;

    /**
     * This container provides IDs for the producer
     * or importer related to the new item, packaging, added documentation, or an eco-participation fee.
     * In some markets, such as in France, this may be the importer of the item.
     * This container is supported by a limited number of sites and specific categories.
     * Use the "/api-docs/sell/metadata/resources/marketplace/methods/getExtendedProducerResponsibilityPolicies"
     * method of the <strong>Sell Metatdata API</strong> to retrieve valid categories for a site.
     * @var ExtendedProducerResponsibility|null
     */
    #[Assert\Type(ExtendedProducerResponsibility::class)]
    public ?ExtendedProducerResponsibility $extendedProducerResponsibility = null;

    /**
     * This enumerated value indicates the listing format of the offer.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/inventory/types/slr:FormatTypeEnum
     *
     * @var FormatTypeEnum
     */
    #[Assert\Type(FormatTypeEnum::class)]
    public FormatTypeEnum $format;

    /**
     * This field is returned as <code>true</code> if the private listing feature has been enabled for the offer.
     * Sellers may want to use this feature when they believe that a listing's potential bidders/buyers
     * would not want their obfuscated user IDs (and feedback scores) exposed to other users.
     * <br><br> This field is always returned even if not explicitly set in the offer.
     * It defaults to <code>false</code>,
     * so will get returned as <code>false</code>
     * if seller does not set this feature with a 'Create' or 'Update' offer method.
     */
    #[Assert\Type('bool')]
    public bool $hideBuyerDetails = false;

    /** This field indicates whether or not eBay product catalog details are applied to a listing. A value of <code>true</code> indicates the listing corresponds to the eBay product associated with the provided product identifier. The product identifier is provided in <strong>createOrReplaceInventoryItem</strong>.<p><span class="tablenote"><strong>Note:</strong> Though the <strong>includeCatalogProductDetails</strong> parameter is not required to be submitted in the request, the parameter defaults to 'true' if omitted.</span></p> */
    #[Assert\Type('bool')]
    public bool $includeCatalogProductDetails = true;

    /**
     * For published offers, this container is always returned in the <strong>getOffer</strong>
     * and <strong>getOffers</strong> calls,
     * and includes the eBay listing ID associated with the offer,
     * the status of the listing, and the quantity sold through the listing.
     * The <strong>listing</strong> container is not returned at all for unpublished offers.
     * @var ListingDetails|null
     */
    #[Assert\Type(ListingDetails::class)]
    public ?ListingDetails $listing;

    /** The description of the eBay listing that is part of the unpublished or published offer. This field is always returned for published offers, but is only returned if set for unpublished offers.<br><br><strong>Max Length</strong>: 500000 (which includes HTML markup/tags) */
    #[Assert\Type('string')]
    public ?string $listingDescription = null;

    /**
     * This field indicates the number of days that the listing will be active.
     * <br><br>This field is returned for both auction and fixed-price listings;
     * however, the value returned for fixed-price listings will always be <code>GTC</code>.
     * The GTC (Good 'Til Cancelled) listings are automatically renewed each calendar month
     * until the seller decides to end the listing.<br><br><span class="tablenote">
     * <strong>Note:</strong>
     * If the listing duration expires for an auction offer,
     * the listing then becomes available as a fixed-price offer and will be GTC.
     * </span> For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/inventory/types/slr:ListingDurationEnum
     *
     * @var ListingDurationEnum
     */
    #[Assert\Type(ListingDurationEnum::class)]
    public ListingDurationEnum $listingDuration;

    /**
     * This container indicates the listing policies that are applied to the offer.
     * Listing policies include business policies, custom listing policies,
     * and fields that override shipping costs, enable eBay Plus eligibility,
     * or enable the Best Offer feature.<br><br>
     * It is required that the seller be opted into Business Policies
     * before being able to create live eBay listings through the Inventory API.
     * Sellers can opt-in to Business Policies through My eBay or by using the Account API's
     * <strong>optInToProgram</strong> call.
     * Payment, return, and fulfillment listing policies may be created/managed in My eBay
     * or by using the listing policy calls of the sell <strong>Account API</strong>.
     * The sell <strong>Account API</strong> can also be used to create and manage custom policies.
     * For more information, see the sell "/api-docs/sell/account/overview.html".
     * <br><br>For unpublished offers where business policies have yet to be specified,
     * this container will be returned as empty.
     *
     * @var ListingPolicies
     */
    #[Assert\Type(ListingPolicies::class)]
    public ListingPolicies $listingPolicies;

    /** This timestamp is the date/time that the seller set for the scheduled listing. With the scheduled listing feature, the seller can set a time in the future that the listing will become active, instead of the listing becoming active immediately after a <strong>publishOffer</strong> call. <br><br> Scheduled listings do not always start at the exact date/time specified by the seller, but the date/time of the timestamp returned in <strong>getOffer</strong>/<strong>getOffers</strong> will be the same as the timestamp passed into a 'Create' or 'Update' offer call. <br><br> This field is returned if set for an offer. */
    #[Assert\Type('string')]
    public ?string $listingStartDate = null;

    /** This field is only applicable and returned if the listing is a lot listing. A lot listing is a listing that has multiple quantity of the same product. An example would be a set of four identical car tires. The integer value in this field is the number of identical items being sold through the lot listing. */
    #[Assert\Type('int')]
    public ?int $lotSize = null;

    /**
     * This enumeration value is the unique identifier of the eBay site on which the offer is available,
     * or will be made available.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/inventory/types/slr:MarketplaceEnum
     *
     * @var MarketplaceEnum
     */
    #[Assert\Type(MarketplaceEnum::class)]
    public MarketplaceEnum $marketplaceId;

    /** The unique identifier of the inventory location. This identifier is set up by the merchant when the inventory location is first created with the <strong>createInventoryLocation</strong> call. Once this value is set for an inventory location, it can not be modified. To get more information about this inventory location, the <strong>getInventoryLocation</strong> call can be used, passing in this value at the end of the call URI.<br><br>This field is always returned for published offers, but is only returned if set for unpublished offers.<br><br><b>Max length</b>: 36 */
    #[Assert\Type('string')]
    public string $merchantLocationKey;

    /** The unique identifier of the offer. This identifier is used in many offer-related calls, and it is also used in the <strong>bulkUpdatePriceQuantity</strong> call. */
    #[Assert\Type('string')]
    public string $offerId;

    /**
     * This container shows the listing price for the product offer,
     * and if applicable, the settings for the Minimum Advertised Price and Strikethrough Pricing features.
     * The Minimum Advertised Price feature is only available on the US site.
     * Strikethrough Pricing is available on the
     * US, eBay Motors, UK, Germany, Canada (English and French), France, Italy, and Spain sites.
     * <br><br>For unpublished offers where pricing information has yet to be specified,
     * this container will be returned as empty.
     * @var PricingSummary
     */
    #[Assert\Type(PricingSummary::class)]
    public PricingSummary $pricingSummary;

    /** This field is only applicable and set if the seller wishes to set a restriction on the purchase quantity of an inventory item per seller. If this field is set by the seller for the offer, then each distinct buyer may purchase up to, but not exceed the quantity in this field. So, if this field's value is <code>5</code>, each buyer may purchase a quantity of the inventory item between one and five, and the purchases can occur in one multiple-quantity purchase, or over multiple transactions. If a buyer attempts to purchase one or more of these products, and the cumulative quantity will take the buyer beyond the quantity limit, that buyer will be blocked from that purchase.<br> */
    #[Assert\Type('int')]
    public ?int $quantityLimitPerBuyer = null;

    /**
     * <span class="tablenote">This container, as well as its child containers and fields,
     * will not be available until March 1, 2023.</span><br><br>
     * This container is used by the seller to provide hazardous material related information
     * and the repair score for the listing.
     * @var Regulatory|null
     */
    #[Assert\Type(Regulatory::class)]
    public ?Regulatory $regulatory = null;

    /** The unique identifier for a secondary category. This field is applicable if the seller decides to list the item under two categories. Sellers can use the <a href="/api-docs/commerce/taxonomy/resources/category_tree/methods/getCategorySuggestions" target="_blank">getCategorySuggestions</a> method of the Taxonomy API to retrieve suggested category ID values. A fee may be charged when adding a secondary category to a listing. <br><br><span class="tablenote"><strong>Note:</strong> You cannot list <strong>US eBay Motors</strong> vehicles in two categories. However, you can list <strong>Parts & Accessories</strong> in two categories.</span> */
    #[Assert\Type('string')]
    public ?string $secondaryCategoryId = null;

    /** This is the seller-defined SKU value of the product in the offer.<br><br><strong>Max Length</strong>: 50 <br> */
    #[Assert\Type('string')]
    public string $sku;

    /**
     * The enumeration value in this field specifies the status of the offer - either <code>PUBLISHED</code>
     * or <code>UNPUBLISHED</code>.
     * For implementation help, refer to https://developer.ebay.com/api-docs/sell/inventory/types/slr:OfferStatusEnum
     *
     * @var OfferStatusEnum
     */
    #[Assert\Type(OfferStatusEnum::class)]
    public OfferStatusEnum $status;

    /**
     * This container is returned if the seller chose to place the inventory item into one or two eBay store categories
     * that the seller has set up for their eBay store.
     * The string value(s) in this container will be the full path(s) to the eBay store categories,
     * as shown below:
     * <br> <pre><code>"storeCategoryNames": [<br> "/Fashion/Men/Shirts", <br> "/Fashion/Men/Accessories" ],
     * </pre></code>
     * @var string[]|null
     */
    #[Assert\Type('array')]
    public ?array $storeCategoryNames = null;

    /**
     * This container is only returned if a sales tax table,
     * a Value-Added Tax (VAT) rate, and/or a tax exception category code was applied to the offer.
     * Only Business Sellers can apply VAT to their listings.
     * It is possible that the <strong>applyTax</strong> field will be included with a value of <code>true</code>,
     * but a buyer's purchase will not involve sales tax.
     * A sales tax rate must be set up in the seller's sales tax table for the buyer's
     * state/tax jurisdiction in order for that buyer to be subject to sales tax.
     * <br><br>See the https://pages.ebay.com/help/pay/checkout-tax-table.html help page for more information
     * on setting up and using a sales tax table.
     * @var Tax|null
     */
    #[Assert\Type(Tax::class)]
    public ?Tax $tax;
}
