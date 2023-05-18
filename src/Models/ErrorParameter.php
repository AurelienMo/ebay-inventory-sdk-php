<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used to indicate the parameter field/value that caused an issue with the call request.
 */
class ErrorParameter implements EbayModelInterface
{
    /** This type contains the name and value of an input parameter that contributed to a specific error or warning condition. */
    public string $name;

    /** This is the actual value that was passed in for the element specified in the <strong>name</strong> field. */
    public string $value;
}
