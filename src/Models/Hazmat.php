<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This container is used by the seller to provide hazardous material information for the listing.
 * <br><br>Three elements are required to complete the Hazmat section of a listing:
 * <ul><li><b>Pictograms</b></li>
 * <li><b>SignalWord</b></li>
 * <li><b>Statements</b></li>
 * </ul><br>A fourth element, <b>Component</b>, is optional.
 */
class Hazmat implements EbayModelInterface
{
    use FillsModel;

    /** This field is used by the seller to provide component information for the listing. For example, component information can provide the specific material of Hazmat concern.<br><br><b>Max length:</b> 120 */
    #[Assert\Type('string')]
    public ?string $component = null;

    /**
     * An array of comma-separated string values listing applicable pictogram code(s) for Hazard Pictogram(s).
     * <br><br>If your product contains hazardous substances or mixtures,
     * please select the values corresponding to the hazard pictograms
     * that are stated on your product's Safety Data Sheet.
     * The selected hazard information will be displayed on your listing.
     * <br><br><span class="tablenote"><b>Note:</b> Use the
     * "/api-docs/sell/metadata/resources/marketplace/methods/getHazardousMaterialsLabels
     * method in the Metadata API to find supported values for a specific marketplace/site.
     * Refer to "/api-docs/sell/static/metadata/feature-regulatorhazmatcontainer.html#Pictogra"
     * for additional information.</span>
     * @var string[]|null
     */
    #[Assert\Type('array')]
    public ?array $pictograms = null;

    /** This field sets the signal word for hazardous materials in the listing.<br><br>If your product contains hazardous substances or mixtures, please select a value corresponding to the signal word that is stated on your product's Safety Data Sheet. The selected hazard information will be displayed on your listing.<br><br>Valid values are:<ul><li>Danger</li><li>Warning</li></ul><br><span class="tablenote"><b>Note:</b> Use the <a href="/api-docs/sell/metadata/resources/marketplace/methods/getHazardousMaterialsLabels " target="_blank">getHazardousMaterialsLabels</a> method in the <a href="/api-docs/sell/metadata/resources/methods " target="_blank">Metadata API</a> to find supported values for a specific marketplace/site. Refer to <a href="/api-docs/sell/static/metadata/feature-regulatorhazmatcontainer.html#Signal" target="_blank">Signal word information</a> for additional information.</span> */
    #[Assert\Type('string')]
    public ?string $signalWord = null;

    /**
     * An array of comma-separated string values specifying applicable statement code(s)
     * for hazard statement(s) for the listing.
     * <br><br>If your product contains hazardous substances or mixtures,
     * please select the values corresponding to the hazard statements
     * that are stated on your product's Safety Data Sheet.
     * The selected hazard information will be displayed on your listing.
     * <br><br><span class="tablenote"><b>Note:</b>
     * Use the /api-docs/sell/metadata/resources/marketplace/methods/getHazardousMaterialsLabels"
     * method in the Metadata API to find supported values for a specific marketplace/site.
     * Refer to "/api-docs/sell/static/metadata/feature-regulatorhazmatcontainer.html#Hazard"
     * for additional information.<span>
     * @var string[]|null
     */
    #[Assert\Type('array')]
    public ?array $statements = null;
}
