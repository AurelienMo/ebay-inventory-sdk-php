<?php

namespace SapientPro\EbayInventorySDK\Models;

/**
 * This type is used to show the version number and instance of the service or API.
 */
class Version implements EbayModelInterface
{
    /**
     * The instance of the version.
     * @var Version
     */
    public Version $instance;

    /** The version number of the service or API. */
    public string $version;
}
