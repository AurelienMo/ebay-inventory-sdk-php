<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to show the version number and instance of the service or API.
 */
class Version implements EbayModelInterface
{
    use FillsModel;

    /**
     * The instance of the version.
     * @var Version|null
     */
    #[Assert\Type(Version::class)]
    public ?Version $instance = null;

    /** The version number of the service or API. */
    #[Assert\Type('string')]
    public ?string $version = null;
}
