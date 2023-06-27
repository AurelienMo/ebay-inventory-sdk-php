<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to display the result for each offer and/or inventory item that the seller attempted to update with a <strong>bulkUpdatePriceQuantity</strong> call. If any errors or warnings occur, the error/warning data is returned at the offer/inventory item level.
 */
class PriceQuantityResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This array will be returned if there were one or more errors associated with the update to the offer or inventory item record.
     * @var Error[]|null
     */
    #[Assert\Type('array')]
    public ?array $errors = null;

    /** The unique identifier of the offer that was updated. This field will not be returned in situations where the seller is only updating the total 'ship-to-home' quantity of an inventory item record. */
    #[Assert\Type('string')]
    public string $offerId;

    /** This is the seller-defined SKU value of the product. This field is returned whether the seller attempted to update an offer with the SKU value or just attempted to update the total 'ship-to-home' quantity of an inventory item record.<br><br><strong>Max Length</strong>: 50<br> */
    #[Assert\Type('string')]
    public string $sku;

    /** The value returned in this container will indicate the status of the attempt to update the price and/or quantity of the offer (specified in the corresponding <strong>offerId</strong> field) or the attempt to update the total 'ship-to-home' quantity of an inventory item (specified in the corresponding <strong>sku</strong> field). For a completely successful update of an offer or inventory item record, a value of <code>200</code> will appear in this field.  A user can view the <strong>HTTP status codes</strong> section for information on other status codes that may be returned with the <strong>bulkUpdatePriceQuantity</strong> method. */
    #[Assert\Type('int')]
    public int $statusCode;

    /**
     * This array will be returned if there were one or more warnings associated with the update to the offer or inventory item record.
     * @var Error[]|null
     */
    #[Assert\Type('array')]
    public ?array $warnings = null;
}
