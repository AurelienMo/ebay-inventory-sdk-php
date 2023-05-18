<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * <span class="tablenote">The regulatory container, as well as its child containers and fields, will not be available until March 1, 2023.</span><br><br>Type defining the <code>Hazmat</code> and <code>RepairScore</code> regulatory containers that are used at the listing level to provide hazardous material related information and the repair score.
 */
class Regulatory implements EbayModelInterface
{
    /**
     * This container is used by the seller to provide hazardous material information for the listing.<br><br>Three elements are required to complete the Hazmat section of a listing:<ul><li><b>Pictograms</b></li><li><b>SignalWord</b></li><li><b>Statements</b></li></ul><br>The fourth element, <b>Component</b>, is optional.
     * @var Hazmat
     */
    public Hazmat $hazmat;

    /** This field represents the repair index for the listing.<br><br>The repair index identifies the manufacturer's repair score for a product (i.e., how easy is it to repair the product.) This field is a floating point value between 0.0 (i.e., difficult to repair,) and 10.0 (i.e., easily repaired.)<br><br>The format for <b>repairScore</b> is limited to one decimal place. For example:<ul><li><code>7.9</code> and <code>0.0</code> are both valid scores</li><li><code>5.645</code> and <code>2.10</code> are both invalid scores</li></ul><br><span class="tablenote"><b>Note:</b> This field is currently only applicable to a limited number of categories in the French marketplace. Use the <a href="/api-docs/sell/metadata/resources/marketplace/methods/getExtendedProducerResponsibilityPolicies" target="_blank">getExtendedProducerResponsibilityPolicies</a> method to return the list of categories that support repair score. In the response, look for all categories that show REPAIR_SCORE in the <a href="/api-docs/sell/metadata/resources/marketplace/methods/getExtendedProducerResponsibilityPolicies#response.extendedProducerResponsibilities.supportedAttributes.name" target="_blank">supportedAttributes.name</a> field, and the corresponding usage field will indicate if repair score is optional, recommended, or required for that category.</span> */
    public float $repairScore;
}
