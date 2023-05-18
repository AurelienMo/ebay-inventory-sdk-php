<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used to identify business policies including payment, return, and fulfillment policies,
 * and also to identify custom policies. These policies are, or will be, associated with the listing.
 * Every published offer must have a payment, return, and fulfillment business policy associated with it.
 * This type is also used to override the shipping costs of one or more shipping service options that are
 * associated with the fulfillment policy, to enable eBay Plus eligibility for a listing, or to enable the
 * Best Offer feature on the listing.
 */
class ListingPolicies implements EbayModelInterface
{
    /**
     * This container is used if the seller would like to support the Best Offer feature on their listing.
     * To enable the Best Offer feature, the seller will have to set the <strong>bestOfferEnabled</strong>
     * field to <code>true</code>, and the seller also has the option of setting 'auto-accept' and 'auto-decline'
     * price thresholds.
     *
     * This container is only returned if Best Offer is enabled on the listing.
     *
     * @var BestOffer
     */
    public BestOffer $bestOfferTerms;

    /** This field is included in an offer and set to <code>true</code> if a Top-Rated seller is opted in to the eBay Plus program. With the eBay Plus program, qualified sellers must commit to next-day delivery of the item, and the buyers must have an eBay Plus subscription to be eligible to receive the benefits of this program, which are free, next-day delivery, as well as free returns.<br><br>Currently, this program is only available on the Germany and Australian sites.<br><br>This field will be returned in the <strong>getOffer</strong> and <strong>getOffers</strong> calls if set for the offer. */
    public bool $eBayPlusIfEligible;

    /** This unique identifier indicates the fulfillment business policy that will be used once an offer is published and converted to an eBay listing. This fulfillment business policy will set all fulfillment-related settings for the eBay listing.<br><br>Business policies are not immediately required for offers, but are required before an offer can be published. The seller should review the fulfillment business policy before assigning it to the offer to make sure it is compatible with the inventory item and the offer settings. The seller may also want to review the shipping service costs in the fulfillment policy, and that seller might decide to override the shipping costs for one or more shipping service options by using the <strong>shippingCostOverrides</strong> container.<br><br>Business policies can be created and managed in My eBay or with the <strong>Account API</strong>. To get a list of all return policies associated with a seller's account on a specific eBay Marketplace, use the Account API's <strong>getFulfillmentPolicies</strong> call. There are also calls in the <strong>Account API</strong> to retrieve a fulfillment policy by policy ID or policy name.<br><br>This field will be returned in the <strong>getOffer</strong> and <strong>getOffers</strong> calls if set for the offer. */
    public string $fulfillmentPolicyId;

    /** This unique identifier indicates the payment business policy that will be used once an offer is published and converted to an eBay listing. This payment business policy will set all payment-related settings for the eBay listing.<br><br>Business policies are not immediately required for offers, but are required before an offer can be published. The seller should review the payment business policy to make sure that it is compatible with the marketplace and listing category before assigning it to the offer.<br><br>Business policies can be created and managed in My eBay or with the <strong>Account API</strong>. To get a list of all payment policies associated with a seller's account on a specific eBay Marketplace, use the Account API's <strong>getPaymentPolicies</strong> call. There are also calls in the <strong>Account API</strong> to retrieve a payment policy by policy ID or policy name.<br><br>This field will be returned in the <strong>getOffer</strong> and <strong>getOffers</strong> calls if set for the offer. */
    public string $paymentPolicyId;

    /**
     * This field contains an array of up to five IDs specifying the seller created compliance policies for
     * the listing. Custom policies provide buyers with important information and disclosures about products.
     * For example, if you sell batteries and specific disclosures are required, your compliance policy could
     * contain the required disclosures.
     *
     * See <a href="https://www.ebay.com/help/selling/custom-policies/custom-policies?id=5311" target="_blank">Custom Policies</a>
     * for more information. Up to five different compliance policies can be applied to each listing. Refer to
     * the <a href="/api-docs/sell/account/resources/methods#h2-custom_policy" target="_blank">custom_policy</a>
     * resource (in the <strong>Sell Account API</strong>) to create and manage custom policies.
     *
     * @var string[]
     */
    public array $productCompliancePolicyIds;

    /** This unique identifier indicates the return business policy that will be used once an offer is published and converted to an eBay listing. This return business policy will set all return policy settings for the eBay listing.<br><br><span class="tablenote"><b>Note:</b> As a part of Digital Services Act (DSA) requirements, as of April 3, 2023, buyers in the EU must be allowed to return an item within 14 days or more, unless the item is exempt. Where applicable, sellers should update their return policies to reflect this requirement of accepting returns from EU buyers.</span><br>Business policies are not immediately required for offers, but are required before an offer can be published. The seller should review the return business policy before assigning it to the offer to make sure it is compatible with the inventory item and the offer settings.<br><br>Business policies can be created and managed in My eBay or with the <strong>Account API</strong>. To get a list of all return policies associated with a seller's account on a specific eBay Marketplace, use the Account API's <strong>getReturnPolicies</strong> call. There are also calls in the <strong>Account API</strong> to retrieve a return policy by policy ID or policy name.<br><br>This field will be returned in the <strong>getOffer</strong> and <strong>getOffers</strong> calls if set for the offer. */
    public string $returnPolicyId;

    /**
     * This container is used if the seller wishes to override the shipping costs or surcharge for one or more
     * domestic or international shipping service options defined in the fulfillment listing policy. To override
     * the costs of a specific domestic or international shipping service option, the seller must know the
     * priority/order of that shipping service in the fulfillment listing policy. The name of a shipping service
     * option can be found in the <strong>shippingOptions.shippingServices.shippingServiceCode</strong> field of the
     * fulfillment policy, and the priority/order of that shipping service option is found in the
     * <strong>shippingOptions.shippingServices.sortOrderId</strong> field. Both of these values can be retrieved by
     * searching for that fulfillment policy with the <strong>getFulfillmentPolicies</strong> or
     * <strong>getFulfillmentPolicyByName</strong> calls of the <strong>Account API</strong>. The
     * <strong>shippingCostOverrides.priority</strong> value should match the
     * <strong>shippingOptions.shippingServices.sortOrderId</strong> in order to override the shipping costs for that
     * shipping service option. The seller must also ensure that the <strong>shippingServiceType</strong> value is
     * set to <code>DOMESTIC</code> to override a domestic shipping service option, or to <code>INTERNATIONAL</code> to
     * override an international shipping service option.
     *
     * A separate <strong>ShippingCostOverrides</strong> node is needed for each shipping service option whose costs
     * are being overridden.
     * All defined fields of the <strong>shippingCostOverrides</strong> container should be included,
     * even if the shipping costs and surcharge values are not changing.
     *
     * The <strong>shippingCostOverrides</strong> container is returned in the <strong>getOffer</strong> and
     * <strong>getOffers</strong>
     * calls if one or more shipping cost overrides are being applied to the fulfillment policy.
     *
     * @var ShippingCostOverride[]
     */
    public array $shippingCostOverrides;

    /** This field specifies the ID of the seller created take-back policy. The law in some countries may require sellers to take back a used product when the buyer buys a new product. See <a href="https://www.ebay.com/help/selling/custom-policies/custom-policies?id=5311 " target="_blank">Custom Policies</a> for more information. One take-back policy ID can be specified for each listing. Refer to the <a href="/api-docs/sell/account/resources/methods#h2-custom_policy " target="_blank">custom_policy</a> resource (in the <strong>Sell Account API</strong>) to create and manage takeback policies. */
    public string $takeBackPolicyId;
}
