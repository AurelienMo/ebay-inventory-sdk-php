<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used to specify/indicate the motor vehicles that are compatible with the corresponding inventory item.
 */
class CompatibleProduct implements EbayModelInterface
{
    /**
     * This container consists of an array of motor vehicles that are compatible with the motor vehicle part
     * or accessory specified by the SKU value in the call URI.
     * Each motor vehicle is defined through a separate set of name/value pairs.
     * In the <strong>name</strong> field, the vehicle aspect (such as 'make', 'model', 'year', 'trim', or 'engine')
     * will be identified, and the <strong>value</strong> field will be used to identify the value of each aspect.
     * The /api-docs/commerce/taxonomy/resources/category_tree/methods/getCompatibilityProperties
     * method of the Taxonomy API can be used to retrieve applicable vehicle aspect names for a specified category,
     * and the /api-docs/commerce/taxonomy/resources/category_tree/methods/getCompatibilityPropertyValues
     * method of the Taxonomy API can be used to retrieve possible values for these same vehicle aspect names.
     * Below is an example of identifying one motor vehicle using the compatibilityProperties container:
     * <br><br><code>&quot;compatibilityProperties&quot; : &#91;
     * <br>&nbsp;&nbsp;&#123;
     * <br>&nbsp;&nbsp;&nbsp;&quot;name&quot; : &quot;make&quot;,
     * <br>&nbsp;&nbsp;&nbsp;&quot;value&quot; : &quot;Subaru&quot;
     * <br>&nbsp;&nbsp;&#125;,<br>&nbsp;&nbsp;&#123;
     * <br>&nbsp;&nbsp;&nbsp;&quot;name&quot; : &quot;model&quot;,
     * <br>&nbsp;&nbsp;&nbsp;&quot;value&quot; : &quot;GL&quot;<br>&nbsp;&nbsp;&#125;,
     * <br>&nbsp;&nbsp;&#123;<br>&nbsp;&nbsp;&nbsp;&quot;name&quot; : &quot;year&quot;,
     * <br>&nbsp;&nbsp;&nbsp;&quot;value&quot; : &quot;1983&quot;
     * <br>&nbsp;&nbsp;&#125;,<br>&nbsp;&nbsp;&#123;
     * <br>&nbsp;&nbsp;&nbsp;&quot;name&quot; : &quot;trim&quot;,
     * <br>&nbsp;&nbsp;&nbsp;&quot;value&quot; : &quot;Base Wagon 4-Door&quot;
     * <br>&nbsp;&nbsp;&#125;,<br>&nbsp;&nbsp;&#123;
     * <br>&nbsp;&nbsp;&nbsp;&quot;name&quot; : &quot;engine&quot;,
     * <br>&nbsp;&nbsp;&nbsp;&quot;value&quot; : &quot;1.8L Turbocharged&quot;
     * <br>&nbsp;&nbsp;&#125;<br>&#93;</code><br><br>
     * Typically, the make, model, and year of the motor vehicle are always required,
     * with the trim and engine being necessary sometimes, but it will be dependent on the part or accessory,
     * and on the vehicle class.
     * <br><br><span class="tablenote">
     * <strong>Note:</strong>
     * The <strong>productFamilyProperties</strong> container is in the process of being deprecated
     * and will no longer be supported in February of 2021,
     * so if you are a new user of <strong>createOrReplaceProductCompatibility</strong>,
     * you should use the <strong>compatibilityProperties</strong>
     * container instead, and if you are already integrated and using the <strong>productFamilyProperties</strong>
     * container, you should make plans to migrate to <strong>compatibilityProperties</strong>.
     * The <strong>productFamilyProperties</strong>
     * and <strong>compatibilityProperties</strong> containers may not be used together or the call will fail.</span>
     * @var NameValueList[]
     */
    public array $compatibilityProperties;

    /** This field is optionally used by the seller to input any notes pertaining to the compatible vehicle list being defined. The seller might use this field to specify the placement of the part on a vehicle or other applicable information. This field will only be returned if specified by the seller.<br><br><strong>Max Length</strong>: 500<br> */
    public string $notes;

    /**
     * This container consists of an array of motor vehicles that are compatible with the motor vehicle part
     * or accessory specified by the SKU value in the call URI.
     * These motor vehicles are identified by properties such as make, model, year, trim, and engine type.
     * A separate <strong>productFamilyProperties</strong> node is needed to specify each compatible motor vehicle.
     * Typically, the make, model, and year of the motor vehicle are always required,
     * with the trim and engine being necessary sometimes, but it will be dependent on the part or accessory,
     * and on the vehicle class.<br><br><span class="tablenote">
     * <strong>Note:</strong>
     * The <strong>productFamilyProperties</strong> container is in the process of being deprecated
     * and will no longer be supported in February of 2021,
     * so if you are a new user of <strong>createOrReplaceProductCompatibility</strong>,
     * you should use the newer <strong>compatibilityProperties</strong> container instead,
     * and if you are already integrated and using the <strong>productFamilyProperties</strong> container,
     * you should make plans to migrate to <strong>compatibilityProperties</strong>.
     * The <strong>productFamilyProperties</strong>
     * and <strong>compatibilityProperties</strong> containers may not be used together or the call will fail.</span>
     * @var ProductFamilyProperties
     */
    public ProductFamilyProperties $productFamilyProperties;

    /**
     * This container is used in a <strong>createOrReplaceProductCompatibility</strong> call
     * to identify a motor vehicle that is compatible with the inventory item.
     * The user specifies either an eBay Product ID (ePID) or K-Type value to identify a vehicle,
     * and if the motor vehicle is found in the eBay product catalog,
     * the motor vehicle properties (make, model, year, trim, engine) will automatically be populated for the vehicle.
     * If the vehicle cannot be found using these identifiers,
     * the vehicle will not be added to the compatible vehicle list.
     * <br><br>Note that this container will not be returned in the <strong>getProductCompatibility</strong> call.
     * @var ProductIdentifier
     */
    public ProductIdentifier $productIdentifier;
}
