<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Enums\StatusEnum;
use SapientPro\EbayInventorySDK\Enums\StoreTypeEnum;

/**
 * This type is used by the <strong>createInventoryLocation</strong> call to provide details on the
 * inventory location, including the location's name, physical address, operating hours, special hours,
 * phone number, and other details of an inventory location.
 */
class InventoryLocationFull implements EbayModelInterface
{
    /**
     * This required container is used to set the physical address and geographical coordinates (optional)
     * of a warehouse or store inventory location. A warehouse inventory location only requires the city,
     * province/state, and country, and does not require a full street address. However, the seller may
     * still supply a full street address for a warehouse location. The physical location/address for an
     * inventory location cannot be modified once set with a <strong>createInventoryLocation</strong> call.
     * All other details of an inventory location (e.g., phone or operating hours) can be changed with
     * an <strong>updateInventoryLocation</strong> call.
     *
     * @var LocationDetails
     */
    public LocationDetails $location;

    /** This text field is used by the merchant to provide additional information about an inventory location. <br><br><b>Max length</b>: 256 */
    public string $locationAdditionalInformation;

    /** This text field is generally used by the merchant to provide special pickup instructions for a store inventory location. Although this field is optional, it is recommended that merchants provide this field to create a pleasant and easy pickup experience for In-Store Pickup and Click and Collect orders. If this field is not included in the call request payload, eBay will use the default pickup instructions contained in the merchant's profile (if available). <br><br> */
    public string $locationInstructions;

    /**
     * This container is used to define the function of the inventory location. Typically, an inventory
     * location will serve as a store or a warehouse, but in some cases, an inventory location may be both.
     *
     * For In-Store Pickup inventory set <b>StoreTypeEnum</b> to <code>STORE</code>.
     *
     * If this container is omitted, the location type of the inventory location will default to
     * <code>WAREHOUSE</code>. See <a href="/api-docs/sell/inventory/types/api:StoreTypeEnum">StoreTypeEnum</a>
     * for the supported values.
     *
     * <b>Default</b>: WAREHOUSE
     *
     * @var StoreTypeEnum[]
     */
    public array $locationTypes;

    /** This text field is used by the merchant to provide the Website address (URL) associated with the inventory location. <br><br><b>Max length</b>: 512 */
    public string $locationWebUrl;

    /**
     * This field is used to indicate whether the inventory location will be enabled
     * (inventory can be loaded to location)
     * or disabled (inventory cannot be loaded to location). If this field is omitted, a successful
     * <strong>createInventoryLocation</strong> call will automatically enable the inventory location. A merchant
     * may want to create a new inventory location but leave it as disabled if the inventory location is not yet
     * ready for active inventory. Once the inventory location is ready, the merchant can use the
     * <strong>enableInventoryLocation</strong> call to enable an inventory location that is in a disabled state.
     *
     * See <a href="/api-docs/sell/inventory/types/api:StatusEnum">StatusEnum</a> for the supported values.
     *
     * <b>Default</b>: ENABLED
     *
     * For implementation help, refer to
     * <a href='https://developer.ebay.com/api-docs/sell/inventory/types/api:StatusEnum'>eBay API documentation</a>
     *
     * @var StatusEnum
     */
    public StatusEnum $merchantLocationStatus;

    /** The name of the inventory location. This name should be a human-friendly name as it will be displayed in In-Store Pickup and Click and Collect listings. A name is not required for warehouse inventory locations. For store inventory locations, this field is not immediately required, but will be required before an offer enabled with the In-Store Pickup or Click and Collect capability can be published. So, if the seller omits this field in a <strong>createInventoryLocation</strong> call, it becomes required for an <strong>updateInventoryLocation</strong> call.<br><br><b>Max length</b>: 1000 */
    public string $name;

    /**
     * Although not technically required, this container is highly recommended to be used to specify
     * operating hours for a store inventory location. This container is used to express the regular
     * operating hours for a store location during each day of the week. A <strong>dayOfWeekEnum</strong>
     * field and an <strong>intervals</strong> container will be needed for each day of the week that
     * the store location is open.
     *
     * @var OperatingHours[]
     */
    public array $operatingHours;

    /** Although not technically required, this field is highly recommended to be used to specify the phone number for a store inventory location. <br><br><b>Max length</b>: 36 */
    public string $phone;

    /**
     * This container is used to express the special operating hours for a store inventory location on a
     * specific date, such as a holiday. The special hours specified for the specific date will override
     * the normal operating hours for that particular day of the week.
     *
     * @var SpecialHours[]
     */
    public array $specialHours;
}
