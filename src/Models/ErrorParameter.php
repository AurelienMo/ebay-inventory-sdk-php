<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to indicate the parameter field/value that caused an issue with the call request.
 */
class ErrorParameter implements EbayModelInterface
{
    use FillsModel;

    /** This type contains the name and value of an input parameter that contributed to a specific error or warning condition. */
    #[Assert\Type('string')]
    public ?string $name = null;

    /** This is the actual value that was passed in for the element specified in the <strong>name</strong> field. */
    #[Assert\Type('string')]
    public ?string $value = null;
}
