<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\ShippingServiceTypeEnum;

/**
 * This type is used if the seller wants to override the shipping costs or surcharge associated with a specific domestic or international shipping service option defined in the fulfillment listing policy that is being applied toward the offer. The shipping-related costs that can be overridden include the shipping cost to ship one item, the shipping cost to ship each additional item (if multiple quantity are purchased), and the shipping surcharge applied to the shipping service option.
 */
class ShippingCostOverride implements EbayModelInterface
{
    /**
     * The dollar value passed into this field will override the additional shipping cost that is currently set for the applicable shipping service option. The "Additional shipping cost" is the cost to ship each additional identical product to the buyer using the corresponding shipping service. The shipping service option in the fulfillment policy to override is controlled by the <strong>shippingServiceType</strong> and <strong>priority</strong> values.<br><br>If using an <strong>updateOffer</strong> call, and this field is defined for the offer being updated, this field must be supplied again, even if its value is not changing.<br><br>This field is returned in the <strong>getOffer</strong> and <strong>getOffers</strong> calls if defined.
     * @var Amount
     */
    public Amount $additionalShippingCost;

    /** The integer value input into this field, along with the <strong>shippingServiceType</strong> value, sets which domestic or international shipping service option in the fulfillment policy will be modified with updated shipping costs. Specifically, the <strong>shippingCostOverrides.shippingServiceType</strong> value in a <strong>createOffer</strong> or <strong>updateOffer</strong> call must match the <strong>shippingOptions.optionType</strong> value in a fulfillment listing policy, and the <strong>shippingCostOverrides.priority</strong> value in a <strong>createOffer</strong> or <strong>updateOffer</strong> call must match the <strong>shippingOptions.shippingServices.sortOrderId</strong> value in a fulfillment listing policy.<br><br>This field is always required when overriding the shipping costs of a shipping service option, and will be always be returned for each shipping service option whose costs are being overridden. */
    public int $priority;

    /**
     * The dollar value passed into this field will override the shipping cost that is currently set for the applicable shipping service option. This value will be the cost to ship one item to the buyer using the corresponding shipping service.  The shipping service option in the fulfillment policy to override is controlled by the <strong>shippingServiceType</strong> and <strong>priority</strong> values.<br><br>If using an <strong>updateOffer</strong> call, and this field is defined for the offer being updated, this field must be supplied again, even if its value is not changing.<br><br>This field is returned in the <strong>getOffer</strong> and <strong>getOffers</strong> calls if defined.
     * @var Amount
     */
    public Amount $shippingCost;

    /**
     * This enumerated value indicates whether the shipping service specified in the <strong>priority</strong> field is a domestic or an international shipping service option. To override the shipping costs for a specific domestic shipping service in the fulfillment listing policy, this field should be set to <code>DOMESTIC</code>, and to override the shipping costs for each international shipping service, this field should be set to <code>INTERNATIONAL</code>. This value, along with <strong>priority</strong> value, sets which domestic or international shipping service option in the fulfillment policy that will be modified with updated shipping costs. Specifically, the <strong>shippingCostOverrides.shippingServiceType</strong> value in a <strong>createOffer</strong> or <strong>updateOffer</strong> call must match the <strong>shippingOptions.optionType</strong> value in a fulfillment listing policy, and the <strong>shippingCostOverrides.priority</strong> value in a <strong>createOffer</strong> or <strong>updateOffer</strong> call must match the <strong>shippingOptions.shippingServices.sortOrderId</strong> value in a fulfillment listing policy.<br><br>This field is always required when overriding the shipping costs of a shipping service option, and will be always be returned for each shipping service option whose costs are being overridden. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:ShippingServiceTypeEnum'>eBay API documentation</a>
     *
     * @var ShippingServiceTypeEnum
     */
    public ShippingServiceTypeEnum $shippingServiceType;

    /**
     * <span class="tablenote"> <strong>Note:</strong> DO NOT USE THIS FIELD. Shipping surcharges for shipping service options can no longer be set with fulfillment business policies. To set a shipping surcharge for a shipping service option, only the <b>Shipping rate tables</b> tool in My eBay can be used. </span><br><br>The dollar value passed into this field will override the shipping surcharge that is currently set for the applicable shipping service option. The shipping service option in the fulfillment policy to override is controlled by the <strong>shippingServiceType</strong> and <strong>priority</strong> values.<br><br>If using an <strong>updateOffer</strong> call, and this field is defined for the offer being updated, this field must be supplied again, even if its value is not changing.<br><br>This field is returned in the <strong>getOffer</strong> and <strong>getOffers</strong> calls if defined.
     * @var Amount
     */
    public Amount $surcharge;
}
