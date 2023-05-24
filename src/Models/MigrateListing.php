<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used to specify one to five eBay listings that will be migrated to the new Inventory model.
 */
class MigrateListing implements EbayModelInterface
{
    use FillsModel;

    /** The unique identifier of the eBay listing to migrate to the new Inventory model. In the Trading API, this field is known as the <strong>ItemID</strong>. Up to five unique eBay listings may be specified here in separate <strong>listingId</strong> fields. The seller should make sure that each of these listings meet the requirements that are stated at the top of this Call Reference page. */
    public string $listingId;
}
