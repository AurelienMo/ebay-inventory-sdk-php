<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\StatusEnum;
use SapientPro\EbayInventorySDK\Enums\StoreTypeEnum;
use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base response of the <strong>getInventoryLocation</strong> and
 * <strong>getInventoryLocations</strong> calls. These responses provide details about inventory
 * location(s) defined for the merchant's account.
 */
class InventoryLocationResponse implements EbayModelInterface
{
    use FillsModel;

    /**
     * This container provides location details of an inventory location. The <strong>address</strong>
     * container will always be returned, but it will not always have a complete street address. Except
     * in the case of an inventory location that supports In-Store Pickup inventory, a full address is
     * not a requirement when setting up an inventory location. The <strong>geoCoordinates</strong>
     * container will only be returned if the merchant provided geographical coordinates. The
     * <strong>locationId</strong> field is always returned, but this value is only used internally by eBay.
     *
     * @var Location
     */
    #[Assert\Type(Location::class)]
    public Location $location;

    /** This text field provides additional information about an inventory location. This field is returned if it is set for the inventory location. <br><br><b>Max length</b>: 256 */
    #[Assert\Type('string')]
    public ?string $locationAdditionalInformation = null;

    /** This text field is used by the merchant to provide special pickup instructions for the store location. This field can help create a pleasant and easy pickup experience for In-Store Pickup and Click and Collect orders. If this field was not set up through a <strong>createInventoryLocation</strong> or a <strong>updateInventoryLocation</strong> call, eBay will use the default pickup instructions contained in the merchant's profile.<br><br><b>Max length</b>: 1000 */
    #[Assert\Type('string')]
    public ?string $locationInstructions = null;

    /**
     * This container defines the function of the inventory location. Typically, an inventory location will
     * serve as a store or a warehouse, but in some cases, an inventory location may be both.
     *
     * For In-Store Pickup inventory set <b>StoreTypeEnum</b> to <code>STORE</code>.
     *
     * The location type of an inventory location defaults to <code>WAREHOUSE</code> if a location type is
     * not specified when a merchant creates an inventory location.
     *
     * @var StoreTypeEnum[]
     */
    #[Assert\Type('array')]
    public array $locationTypes;

    /** This text field shows the  Website address (URL) associated with the inventory location. This field is returned if defined for the inventory location. <br><br><b>Max length</b>: 512 */
    #[Assert\Type('string')]
    public ?string $locationWebUrl = null;

    /** The unique identifier of the inventory location. This identifier is set up by the merchant when the inventory location is first created with the <strong>createInventoryLocation</strong> call. Once this value is set for an inventory location, it cannot be modified.<br><br><b>Max length</b>: 36 */
    #[Assert\Type('string')]
    public string $merchantLocationKey;

    /**
     * This field indicates whether the inventory location is enabled (inventory can be loaded to location)
     * or disabled (inventory cannot be loaded to location). The merchant can use the
     * <strong>enableInventoryLocation</strong> call to enable an inventory location in disabled status, or
     * the <strong>disableInventoryLocation</strong> call to disable an inventory location in enabled status.
     *
     * For implementation help, refer to
     * <a href='https://developer.ebay.com/api-docs/sell/inventory/types/api:StatusEnum'>eBay API documentation</a>
     *
     * @var StatusEnum
     */
    #[Assert\Type(StatusEnum::class)]
    public StatusEnum $merchantLocationStatus;

    /** The name of the inventory location. This name should be a human-friendly name as it will be displayed in In-Store Pickup and Click and Collect listings. For store inventory locations, this field is not required for the <strong>createInventoryLocation</strong> call, but a store inventory location must have a defined <strong>name</strong> value before an In-Store Pickup and Click and Collect enabled offer is published. So, if the seller omits this field in the <strong>createInventoryLocation</strong> call, it will have to be added later through a <strong>updateInventoryLocation</strong> call.<br><br><b>Max length</b>: 1000 */
    #[Assert\Type('string')]
    public ?string $name = null;

    /**
     * This container shows the regular operating hours for a store location during the days of the week.
     * A <strong>dayOfWeekEnum</strong> field and an <strong>intervals</strong> container are shown for each
     * day of the week that the store location is open.
     *
     * @var OperatingHours[]
     */
    #[Assert\Type('array')]
    public ?array $operatingHours = null;

    /** The phone number for an inventory location. This field will typically only be set and returned for store locations.<br><br><b>Max length</b>: 36 */
    #[Assert\Type('string')]
    public ?string $phone = null;

    /**
     * This container shows the special operating hours for a store location on a specific date or dates.
     * @var SpecialHours[]
     */
    #[Assert\Type('array')]
    public ?array $specialHours = null;
}
