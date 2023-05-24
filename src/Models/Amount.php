<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used to express a dollar value and the applicable currency.
 */
class Amount implements EbayModelInterface
{
    use FillsModel;

    /** A three-digit string value respresenting the type of currency being used. Both the <strong>value</strong> and <strong>currency</strong> fields are required/always returned when expressing prices. See the <a href="/api-docs/sell/inventory/types/ba:CurrencyCodeEnum" target="_blank">CurrencyCodeEnum</a> type for the full list of currencies and their corresponding three-digit string values. */
    public string $currency;

    /** A string representation of a dollar value expressed in the currency specified in the <strong>currency</strong> field. Both the <strong>value</strong> and <strong>currency</strong> fields are required/always returned when expressing prices. */
    public string $value;
}
