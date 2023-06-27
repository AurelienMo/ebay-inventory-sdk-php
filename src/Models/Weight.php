<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\WeightUnitOfMeasureEnum;
use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to specify the weight (and the unit used to measure that weight) of a shipping package. The <strong>weight</strong> container is conditionally required if the seller will be offering calculated shipping rates to determine shipping cost, or is using flat-rate costs, but charging a weight surcharge. See the <a href="https://pages.ebay.com/help/pay/calculated-shipping.html " target="_blank">Calculated shipping</a> help page for more information on calculated shipping.
 */
class Weight implements EbayModelInterface
{
    /**
     * The unit of measurement used to specify the weight of a shipping package. Both the <strong>unit</strong> and <strong>value</strong> fields are required if the <strong>weight</strong> container is used. If the English system of measurement is being used, the applicable values for weight units are <code>POUND</code> and <code>OUNCE</CODE>. If the metric system of measurement is being used, the applicable values for weight units are <code>KILOGRAM</code> and <code>GRAM</code>. The metric system is used by most countries outside of the US. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/inventory/types/slr:WeightUnitOfMeasureEnum'>eBay API documentation</a>
     *
     * @var WeightUnitOfMeasureEnum|null
     */
    public ?WeightUnitOfMeasureEnum $unit = null;

    /** The actual weight (in the measurement unit specified in the <strong>unit</strong> field) of the shipping package. Both the <strong>unit</strong> and <strong>value</strong> fields are required if the <strong>weight</strong> container is used. If a shipping package weighed 20.5 ounces, the container would look as follows: <br><pre>"weight": {<br> "value": 20.5,<br> "unit": "OUNCE"<br> }</pre> */
    public ?float $value = null;
}
