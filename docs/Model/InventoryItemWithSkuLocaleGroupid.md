# InventoryItemWithSkuLocaleGroupid

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**availability** | [**\EBay\Inventory\Model\AvailabilityWithAll**](AvailabilityWithAll.md) |  | [optional] 
**condition** | **string** | This enumeration value indicates the condition of the item. Supported item condition values will vary by eBay site and category. &lt;br /&gt;&lt;br /&gt; Since the condition of an inventory item must be specified before being published in an offer, this field is always returned in the &#x27;Get&#x27; calls for SKUs that are part of a published offer. If a SKU is not part of a published offer, this field will only be returned if set for the inventory item. For implementation help, refer to &lt;a href&#x3D;&#x27;https://developer.ebay.com/api-docs/sell/inventory/types/slr:ConditionEnum&#x27;&gt;eBay API documentation&lt;/a&gt; | [optional] 
**conditionDescription** | **string** | This string field is used by the seller to more clearly describe the condition of used items, or items that are not &#x27;Brand New&#x27;, &#x27;New with tags&#x27;, or &#x27;New in box&#x27;. The ConditionDescription field is available for all categories. If the ConditionDescription field is used with an item in a new condition (Condition IDs 1000-1499), eBay will simply ignore this field if included, and eBay will return a warning message to the user. This field should only be used to further clarify the condition of the used item. It should not be used for branding, promotions, shipping, returns, payment or other information unrelated to the condition of the item. Make sure that the condition value, condition description, listing description, and the item&#x27;s pictures do not contradict one another.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;Max length&lt;/strong&gt;/: 1000. | [optional] 
**groupIds** | **string[]** | This array is returned if the inventory item is associated with any inventory item group(s). The value(s) returned in this array are the unique identifier(s) of the inventory item group(s). This array is not returned if the inventory item is not associated with any inventory item groups. | [optional] 
**inventoryItemGroupKeys** | **string[]** | This array is returned if the inventory item is associated with any inventory item group(s). The value(s) returned in this array are the unique identifier(s) of the inventory item&#x27;s variation in a multiple-variation listing. This array is not returned if the inventory item is not associated with any inventory item groups. | [optional] 
**locale** | **string** | This field is for future use only. For implementation help, refer to &lt;a href&#x3D;&#x27;https://developer.ebay.com/api-docs/sell/inventory/types/slr:LocaleEnum&#x27;&gt;eBay API documentation&lt;/a&gt; | [optional] 
**packageWeightAndSize** | [**\EBay\Inventory\Model\PackageWeightAndSize**](PackageWeightAndSize.md) |  | [optional] 
**product** | [**\EBay\Inventory\Model\Product**](Product.md) |  | [optional] 
**sku** | **string** | The seller-defined Stock-Keeping Unit (SKU) of the inventory item. The seller should have a unique SKU value for every product that they sell. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

