<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type provides IDs for the producer or importer related to the
 * new item, packaging, added documentation, or an eco-participation fee.
 * In some markets, such as in France, this may be the importer of the item.
 */
class ExtendedProducerResponsibility implements EbayModelInterface
{
    use FillsModel;

    /**
     * This is the fee paid for new items to the eco-organization
     * (for example, "eco-organisme" in France).
     * It is a contribution to the financing of the elimination of the item responsibly.
     * <br></br><b>Minimum:</b> 0.0
     * @var Amount|null
     */
    #[Assert\Type(Amount::class)]
    public ?Amount $ecoParticipationFee = null;

    /** <span class="tablenote"><strong>Note:</strong> <strong>DO NOT USE THIS FIELD</strong>. Extended Producer Responsibility IDs will no longer be set at the listing level. Instead, sellers will provide these IDs at the account level when applicable/required. There are no current plans to support these IDs at the account level through an API, so sellers must provide and update these IDs through their eBay account.</span><br>This ID is the Unique Identifier of the producer related to the item. For instance, if the seller is selling a cell phone, it is the ID related to the cell phone. */
    #[Assert\Type('string')]
    public ?string $producerProductId = null;

    /** <span class="tablenote"><strong>Note:</strong> <strong>DO NOT USE THIS FIELD</strong>. Extended Producer Responsibility IDs will no longer be set at the listing level. Instead, sellers will provide these IDs at the account level when applicable/required. There are no current plans to support these IDs at the account level through an API, so sellers must provide and update these IDs through their eBay account.</span><br>This ID is the Unique Identifier of the producer of any paper added to the parcel of the item by the seller. For example, this ID concerns any notice, leaflet, or paper that the seller adds to a cell phone parcel. */
    #[Assert\Type('string')]
    public ?string $productDocumentationId = null;

    /** <span class="tablenote"><strong>Note:</strong> <strong>DO NOT USE THIS FIELD</strong>. Extended Producer Responsibility IDs will no longer be set at the listing level. Instead, sellers will provide these IDs at the account level when applicable/required. There are no current plans to support these IDs at the account level through an API, so sellers must provide and update these IDs through their eBay account.</span><br>The Unique ID of the producer of any packaging related to the product added by the seller. This does not include package in which the product is shipped (see <strong>ShipmentPackageID</strong>). For instance, if the seller adds bubble wrap, it is the ID related to the bubble wrap. */
    #[Assert\Type('string')]
    public ?string $productPackageId = null;

    /** <span class="tablenote"><strong>Note:</strong> <strong>DO NOT USE THIS FIELD</strong>. Extended Producer Responsibility IDs will no longer be set at the listing level. Instead, sellers will provide these IDs at the account level when applicable/required. There are no current plans to support these IDs at the account level through an API, so sellers must provide and update these IDs through their eBay account.</span><br>This ID is the Unique Identifier of the producer of any packaging used by the seller to ship the item. This does not include non-shipping packaging added to the product (see <strong>ProductPackageID</strong>). This ID is required when the seller uses packaging to ship the item. For instance, if the seller uses a different box to ship the item, it is the ID related to the box. */
    #[Assert\Type('string')]
    public ?string $shipmentPackageId = null;
}
