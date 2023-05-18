<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This is the base response of the <strong>createOrReplaceInventoryItem</strong>,
 * <strong>createOrReplaceInventoryItemGroup</strong>,
 *  and <strong>createOrReplaceProductCompatibility</strong>  calls.
 * A response payload will only be returned for these three calls if one or more errors or warnings occur with the call.
 */
class BaseResponse implements EbayModelInterface
{
    /**
     * This container will be returned in a call response payload
     * if one or more warnings or errors are triggered when an Inventory API call is made.
     * This container will contain detailed information about the error or warning.
     * @var Error[]
     */
    public array $warnings;
}
