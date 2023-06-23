<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the <strong>compatibilityProperties</strong> container to identify a motor vehicle using name/value pairs.
 */
class NameValueList implements EbayModelInterface
{
    use FillsModel;

    /** This string value identifies the motor vehicle aspect, such as 'make', 'model', 'year', 'trim', and 'engine'. Typically, the make, model, and year of the motor vehicle are always required, with the trim and engine being necessary sometimes, but it will be dependent on the part or accessory, and on the vehicle class. */
    #[Assert\Type('string')]
    public ?string $name = null;

    /** This string value identifies the motor vehicle aspect specified in the corresponding <strong>name</strong> field. For example, if the <strong>name</strong> field is 'make', this field may be 'Toyota', or if the <strong>name</strong> field is 'model', this field may be 'Camry'. */
    #[Assert\Type('string')]
    public ?string $value = null;
}
