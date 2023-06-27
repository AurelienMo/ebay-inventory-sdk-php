<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\LengthUnitOfMeasureEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to specify the dimensions (and the unit used to measure those dimensions) of a shipping package.
 * The <strong>dimensions</strong> container is conditionally required if the seller
 * will be offering calculated shipping rates to determine shipping cost.
 * See the https://pages.ebay.com/help/pay/calculated-shipping.html help page
 * for more information on calculated shipping.
 */
class Dimension implements EbayModelInterface
{
    /** The actual height (in the measurement unit specified in the <strong>unit</strong> field) of the shipping package. All fields of the <strong>dimensions</strong> container are required if package dimensions are specified. <br><br> If a shipping package measured 21.5 inches in length, 15.0 inches in width, and 12.0 inches in height, the <strong>dimensions</strong> container would look as follows: <br> <pre><code>"dimensions": {<br> "length": 21.5,<br> "width": 15.0,<br> "height": 12.0,<br> "unit": "INCH"<br> } </pre></code> */
    #[Assert\Type('float')]
    public ?float $height = null;

    /** The actual length (in the measurement unit specified in the <strong>unit</strong> field) of the shipping package. All fields of the <strong>dimensions</strong> container are required if package dimensions are specified. <br><br> If a shipping package measured 21.5 inches in length, 15.0 inches in width, and 12.0 inches in height,  the <strong>dimensions</strong> container would look as follows: <br> <pre><code>"dimensions": {<br> "length": 21.5,<br> "width": 15.0,<br> "height": 12.0,<br> "unit": "INCH"<br> } </pre></code> */
    #[Assert\Type('float')]
    public ?float $length = null;

    /**
     * The unit of measurement used to specify the dimensions of a shipping package.
     * All fields of the <strong>dimensions</strong> container are required if package dimensions are specified.
     * If the English system of measurement is being used, the applicable values for dimension units are
     * <code>FEET</code> and <code>INCH</code>.
     * If the metric system of measurement is being used, the applicable values for weight units are
     * <code>METER</code> and <code>CENTIMETER</code>.
     * The metric system is used by most countries outside of the US.
     * For implementation help, refer to
     * https://developer.ebay.com/api-docs/sell/inventory/types/slr:LengthUnitOfMeasureEnum
     *
     * @var LengthUnitOfMeasureEnum|null
     */
    #[Assert\Type(LengthUnitOfMeasureEnum::class)]
    public ?LengthUnitOfMeasureEnum $unit = null;

    /** The actual width (in the measurement unit specified in the <strong>unit</strong> field) of the shipping package. All fields of the <strong>dimensions</strong> container are required if package dimensions are specified.<br><br> If a shipping package measured 21.5 inches in length, 15.0 inches in width, and 12.0 inches in height,  the <strong>dimensions</strong> container would look as follows: <br> <pre><code>"dimensions": {<br> "length": 21.5,<br> "width": 15.0,<br> "height": 12.0,<br> "unit": "INCH"<br> } </pre></code> */
    #[Assert\Type('float')]
    public ?float $width = null;
}
