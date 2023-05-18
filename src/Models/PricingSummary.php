<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\MinimumAdvertisedPriceHandlingEnum;
use SapientPro\EbayInventorySDK\Enums\SoldOnEnum;

/**
 * This type is used to specify the listing price for the product and settings for the Minimum Advertised Price and Strikethrough Pricing features. The <strong>price</strong> field must be supplied before an offer is published, but a seller may create an offer without supplying a price initially. The Minimum Advertised Price feature is only available on the US site. Strikethrough Pricing is available on the US, eBay Motors, UK, Germany, Canada (English and French), France, Italy, and Spain sites.
 */
class PricingSummary implements EbayModelInterface
{
    /**
     * This field indicates the lowest price at which the seller is willing to sell an item through an auction listing. Note that setting a Reserve Price will incur a listing fee of $5 or 7.5% of the Reserve Price, whichever is greater. The minimum fee is $5.<br><br><span class="tablenote"><b>Important:</b> This fee is charged regardless of whether or not the item is sold.</span>
     * @var Amount
     */
    public Amount $auctionReservePrice;

    /**
     * This field indicates the minimum bidding price for the auction. The bidding starts at this price.<br><br><span class="tablenote"><b>Note:</b> If the <b>auctionReservePrice</b> is also specified, the value of <b>auctionStartPrice</b> must be lower than the value of <b>auctionReservePrice</b>.</span>
     * @var Amount
     */
    public Amount $auctionStartPrice;

    /**
     * This container is needed if the Minimum Advertised Price (MAP) feature will be used in the offer. Minimum Advertised Price (MAP) is an agreement between suppliers (or manufacturers (OEM)) and the retailers (sellers) stipulating the lowest price an item is allowed to be advertised at. Sellers can only offer prices below this price through the use of other discounts. The MAP feature is only available to eligible US sellers. This field will be ignored if the seller and or the listing is not eligible for the MAP feature.<br><br>This container will be returned if set for the offer.
     * @var Amount
     */
    public Amount $minimumAdvertisedPrice;

    /**
     * This field is needed if the Strikethrough Pricing (STP) feature will be used in the offer. This field indicates that the product was sold for the price in the <strong>originalRetailPrice</strong> field on an eBay site, or sold for that price by a third-party retailer. When using the <strong>createOffer</strong> or <strong>updateOffer</strong> calls, the seller will pass in a value of <code>ON_EBAY</code> to indicate that the product was sold for the <strong>originalRetailPrice</strong> on an eBay site, or the seller will pass in a value of <code>OFF_EBAY</code> to indicate that the product was sold for the <strong>originalRetailPrice</strong> through a third-party retailer. This field and the <strong>originalRetailPrice</strong> field are only applicable if the seller and listing are eligible to use the Strikethrough Pricing feature, a feature which is limited to the US (core site and Motors), UK, Germany, Canada (English and French versions), France, Italy, and Spain sites.<br><br>This field will be returned if set for the offer. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:SoldOnEnum'>eBay API documentation</a>
     * @var SoldOnEnum
     */
    public SoldOnEnum $originallySoldForRetailPriceOn;

    /**
     * This container is needed if the Strikethrough Pricing (STP) feature will be used in the offer. The dollar value passed into this field indicates the original retail price set by the manufacturer (OEM). eBay does not maintain or validate the value supplied here by the seller. The dollar value in this field should always be more than the dollar value in the <strong>price</strong> container. This field and the <strong>originallySoldForRetailPriceOn</strong> field are only applicable if the seller and listing are eligible to use the Strikethrough Pricing feature, a feature which is limited to the US (core site and Motors), UK, Germany, Canada (English and French versions), France, Italy, and Spain sites. Compare the <strong>originalRetailPrice</strong> and the dollar value in the <strong>price</strong> field to determine the amount of savings to the buyer. This Original Retail Price will have a strikethrough line through for a marketing affect.<br><br>This container will be returned if set for the offer.
     * @var Amount
     */
    public Amount $originalRetailPrice;

    /**
     * This is the listing price of the product. A listing price must be specified before publishing an offer, but it is possible to create an offer without a price.<br><br>For published offers, this container will always be returned, but for unpublished offers, this container will only be returned if set for the offer.
     * @var Amount
     */
    public Amount $price;

    /**
     * This field is needed if the Minimum Advertised Price (MAP) feature will be used in the offer. This field is only applicable if an eligible US seller is using the Minimum Advertised Price (MAP) feature and a <strong>minimumAdvertisedPrice</strong> has been specified. The value set in this field will determine whether the MAP price is shown to a prospective buyer prior to checkout through a pop-up window accessed from the View Item page, or if the MAP price is not shown until the checkout flow after the buyer has already committed to buying the item. To show the MAP price prior to checkout, the seller will set this value to <code>PRE_CHECKOUT</code>. To show the MAP price after the buyer already commits to buy the item, the seller will set this value to <code>DURING_CHECKOUT</code>. This field will be ignored if the seller and/or the listing is not eligible for the MAP feature.<br><br>This field will be returned if set for the offer. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:MinimumAdvertisedPriceHandlingEnum'>eBay API documentation</a>
     * @var MinimumAdvertisedPriceHandlingEnum
     */
    public MinimumAdvertisedPriceHandlingEnum $pricingVisibility;
}
