<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\ConditionEnum;
use SapientPro\EbayInventorySDK\Enums\LocaleEnum;

/**
 * This type is used to define/modify each inventory item record that is being created and/or updated
 * with the <strong>bulkCreateOrReplaceInventoryItem</strong> method. Up to 25 inventory item records
 * can be created and/or updated with one call.
 */
class InventoryItemWithSkuLocale implements EbayModelInterface
{
    /**
     * This container is used to specify the quantity of the inventory item that is available for purchase.
     * <br><br>
     * This container is optional up until the seller is ready to publish an offer with the SKU, at which
     * time it becomes required. Availability data must also be passed if an inventory item is being updated
     * and availability data already exists for that inventory item.
     * <br><br>
     * Since an inventory item must have specified quantity before being published in an offer, this container
     * is always returned in the 'Get' calls for SKUs that are part of a published offer. If a SKU is not part
     * of a published offer, this container will only be returned if set for the inventory item.
     * @var Availability
     */
    public Availability $availability;

    /**
     * This enumeration value indicates the condition of the item. Supported item condition values will
     * vary by eBay site and category. To see which item condition values that a particular eBay category
     * supports, use the <a href="/api-docs/sell/metadata/resources/marketplace/methods/getItemConditionPolicies"
     * target="_blank">getItemConditionPolicies</a> method of the <strong>Metadata API</strong>. This method
     * returns condition ID values that map to the enumeration values defined in the
     * <a href="/api-docs/sell/inventory/types/slr:ConditionEnum" target="_blank">ConditionEnum</a> type.
     * The <a href="/api-docs/sell/static/metadata/condition-id-values.html" target="_blank">Item condition
     * ID and name values</a> topic in the <strong>Selling Integration Guide</strong> has a table that maps
     * condition ID values to <strong>ConditionEnum</strong> values. The <strong>getItemConditionPolicies</strong>
     * call reference page has more information.
     * <br><br>
     * A <strong>condition</strong> value is optional up until the seller is ready to publish an offer
     * with the SKU, at which time it becomes required for most eBay categories.
     * <br><br>
     * <span class="tablenote">
     * <strong>Note:</strong> The 'Manufacturer Refurbished' item condition is no longer a valid item
     * condition on any eBay marketplace, and to reflect this change, the <code>MANUFACTURER_REFURBISHED</code>
     * value is no longer applicable, and should not be used. With Version 1.13.0, the CERTIFIED_REFURBISHED
     * enumeration value has been introduced, and CR-eligible sellers should make a note to start using
     * <code>CERTIFIED_REFURBISHED</code> from this point forward. For the time being, if the
     * <code>MANUFACTURER_REFURBISHED</code> enum is used for any of the SKUs in a
     * <strong>bulkCreateOrReplaceInventoryItem</strong> method, it will be accepted but automatically
     * converted by eBay to <code>CERTIFIED_REFURBISHED</code>.
     * <br><br>
     * To list an item as 'Certified Refurbished', a seller must be pre-qualified by eBay for this feature.
     * Any seller who is not eligible for this feature will be blocked if they try to create a new listing
     * or revise an existing listing with this item condition.
     * <br><br>
     * Any seller that is interested in eligibility requirements to list with 'Certified Refurbished'
     * should see the
     * <a href="https://pages.ebay.com/seller-center/listing-and-marketing/certified-refurbished-program.html"
     * target="_blank">Certified refurbished program</a> page in Seller Center.
     * </span>
     * For implementation help, refer to
     * <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:ConditionEnum'>eBay API documentation</a>
     *
     * @var ConditionEnum
     */
    public ConditionEnum $condition;

    /** This string field is used by the seller to more clearly describe the condition of a used inventory item, or an inventory item whose <strong>condition</strong> value is not <code>NEW</code>, <code>LIKE_NEW</code>, <code>NEW_OTHER</code>, or <code>NEW_WITH_DEFECTS</code>.<br><br> The <strong>conditionDescription</strong> field is available for all eBay categories. If the <strong>conditionDescription</strong> field is used with an item in one of the new conditions (mentioned in previous paragraph), eBay will simply ignore this field if included, and eBay will return a warning message to the user. <br><br> This field should only be used to further clarify the condition of the used item. It should not be used for branding, promotions, shipping, returns, payment or other information unrelated to the condition of the used item. Make sure that the <strong>condition</strong> value, condition description, listing description, and the item's pictures do not contradict one another. <br><br> This field is not always required, but is required if an inventory item is being updated and a condition description already exists for that inventory item. <br><br> This field is returned in the <strong>getInventoryItem</strong>, <strong>bulkGetInventoryItem</strong>, and <strong>getInventoryItems</strong> calls if a condition description was provided for a used inventory item.<br><br><strong>Max Length</strong>: 1000. */
    public string $conditionDescription;

    /**
     * This request parameter sets the natural language that was provided in the field values of the
     * request payload (i.e., en_AU, en_GB or de_DE). For implementation help, refer to
     * <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:LocaleEnum'>eBay API documentation</a>
     *
     * @var LocaleEnum
     */
    public LocaleEnum $locale;

    /**
     * This container is used if the seller is offering one or more calculated shipping options for the
     * inventory item, or if the seller is offering flat-rate shipping but is including a shipping surcharge
     * based on the item's weight. This container is used to specify the dimensions and weight of a shipping
     * package.
     * <br><br>
     * This container is not always required, but is required if an inventory item is being updated and
     * shipping package data already exists for that inventory item.
     * <br><br>
     * This container is returned in the <strong>getInventoryItem</strong>, <strong>bulkGetInventoryItem</strong>,
     * and <strong>getInventoryItems</strong> calls if package type, package weight, and/or package dimensions
     * are specified for an inventory item.
     * <br><br>
     * See the
     * <a href="https://pages.ebay.com/help/pay/calculated-shipping.html" target="_blank">Calculated shipping</a>
     * help page for more information on calculated shipping.
     *
     * @var PackageWeightAndSize
     */
    public PackageWeightAndSize $packageWeightAndSize;

    /**
     * This container is used to define the product details, such as product title, product description,
     * product identifiers (eBay Product ID, GTIN, or Brand/MPN pair), product aspects/item specifics, and
     * product images. Note that an eBay Product ID (ePID) or a Global Trade Item Number (GTIN) value can
     * be used in an attempt to find a matching product in the eBay Catalog. If a product match is found,
     * the inventory item record will automatically pick up all product details associated with the eBay
     * Catalog product.
     * <br><br>
     * Many eBay categories will require at least one product identifier (a GTIN or a Brand/MPN pair).
     * To discover which product identifier(s) that an eBay category might require or support, use the
     * <a href="/api-docs/commerce/taxonomy/resources/category_tree/methods/getItemAspectsForCategory"
     * target="_blank">getItemAspectsForCategory</a> method in the Taxonomy API. In the
     * <strong>getItemAspectsForCategory</strong> response, look for product identifier names
     * (<code>brand</code>, <code>mpn</code>, <code>upc</code>, <code>ean</code>, <code>isbn</code>)
     * in the <strong>localizedAspectName</strong> fields, and then look for the corresponding
     * <strong>aspectRequired</strong> boolean fields as well as the corresponding <strong>aspectUsage</strong>
     * field, which will indicate if the aspect is required, recommended, or optional. In some cases,
     * a product identifier type may be required, but not known/applicable for a product. If this is the
     * case, the seller must still include the corresponding field in the inventory item record, but pass
     * in a default text string. This text string can vary by site, so the seller should use the
     * <strong>GeteBayDetails</strong> call of the Trading API to get this string value. In the
     * <strong>GeteBayDetails</strong> call, the seller should include a <strong>DetailName</strong> field
     * with its value set to <code>ProductDetails</code>. In the response of the call, the seller can see
     * the default string value in the <strong>ProductDetails.ProductIdentifierUnavailableText</strong> field.
     * The seller will use this value in one or more of the product identifier fields (<strong>ean</strong>,
     * <strong>isbn</strong>, <strong>upc</strong>, or <strong>mpn</strong>) if a product ID isn't known or applicable.
     * <br><br>
     * This container is not initially required, but it is required before an inventory item can be published
     * as an offer, and/or if an inventory item is being updated and product data already exists for that
     * inventory item.
     * <br><br>
     * This container is always returned for published offers in the <strong>getInventoryItem</strong>,
     * <strong>bulkGetInventoryItem</strong>, and <strong>getInventoryItems</strong> calls since product data
     * must be defined for published offers, but for unpublished inventory items, this container will only
     * be returned if product details have been defined for the inventory item.
     *
     * @var Product
     */
    public Product $product;

    /** This is the seller-defined SKU value of the product that will be listed on the eBay site (specified in the <strong>marketplaceId</strong> field). Only one offer (in unpublished or published state) may exist for each <strong>sku</strong>/<strong>marketplaceId</strong>/<strong>format</strong> combination. This field is required.<br><br><strong>Max Length</strong>: 50<br> */
    public string $sku;
}
