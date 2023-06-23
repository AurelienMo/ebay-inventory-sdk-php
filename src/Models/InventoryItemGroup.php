<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used by the base request payload of the
 * <strong>createOrReplaceInventoryItemGroup</strong> call and the base response
 * payload of the <strong>getInventoryItemGroup</strong> call.
 */
class InventoryItemGroup implements EbayModelInterface
{
    use FillsModel;

    /**
     * This is a collection of item specifics (aka product aspects) name-value pairs
     * that are shared by all product variations within the inventory item group.
     * Common aspects for the inventory item group are not immediately required upon
     * creating an inventory item group, but these aspects will be required before
     * the first offer of the group is published. Common aspects for a men's t-shirt
     * might be pattern and sleeve length. Below is an example of the proper JSON
     * syntax to use when manually inputting item specifics. Note that one item
     * specific name, such as 'Features', can have more than one value. If an item
     * specific name has more than one value, each value is delimited with a comma.<br>
     *
     * <pre>
     * <code>"aspects": {
     *     "pattern": ["solid"],
     *     "sleeves": ["short"]
     * }</code>
     * </pre>
     *
     * This container is always returned if one or more offers associated with the
     * inventory item group have been published, and is only returned if set for an
     * inventory item group if that group has yet to have any offers published.
     */
    #[Assert\Type('array')]
    public ?array $aspects = null;

    /** The description of the inventory item group. This description should fully describe the product and the variations of the product that are available in the inventory item group, since this description will ultimately become the listing description once the first offer of the group is published. This field is not initially required when first creating an inventory item group, but will be required before the first offer of the group is published. <br><br><span class="tablenote"> <strong>Note:</strong> Since this description will ultimately  become the listing description in a multiple-variation listing, the seller should omit the <strong>listingDescription</strong> field when creating the offers for each variation. If they include the <strong>listingDescription</strong> field for the individual offer(s) in an item group, the text in that field for a published offer will overwrite the text provided in this <strong>description</strong> field for the inventory item group.</span><br><br>HTML tags and markup can be used in this field, but each character counts toward the max length limit.<br><br><span class="tablenote"> <strong>Note:</strong> To ensure that their short listing description is optimized when viewed on mobile devices, sellers should strongly consider using eBay's <a href="https://pages.ebay.com/sell/itemdescription/customizeyoursummary.html " target="_blank">View Item description summary feature</a> when listing their items. Keep in mind that the 'short' listing description is what prospective buyers first see when they view the listing on a mobile device. The 'full' listing description is also available to mobile users when they click on the short listing description, but the full description is not automatically optimized for viewing in mobile devices, and many users won't even drill down to the full description.<br><br> Using HTML div and span tag attributes, this feature allows sellers to customize and fully control the short listing description that is displayed to prospective buyers when viewing the listing on a mobile device. The short listing description on mobile devices is limited to 800 characters, and whenever the full listing description (provided in this field, in UI, or seller tool) exceeds this limit, eBay uses a special algorithm to derive the best possible short listing description within the 800-character limit. However, due to some short listing description content being removed, it is definitely not ideal for the seller, and could lead to a bad buyer experience and possibly to a Significantly not as described (SNAD) case, since the buyer may not get complete details on the item when viewing the short listing description. See the eBay help page for more details on using the HTML div and span tags.</span><br><br>This field is always returned if one or more offers associated with the inventory item group have been published, and is only returned if set for an inventory item group if that group has yet to have any offers published.<br><br><strong>Max Length</strong>: 500000 (which includes HTML markup/tags)<br> */
    #[Assert\Type('string')]
    public ?string $description = null;

    /**
     * An array of one or more links to images for the inventory item group. URLs must
     * use the "HTTPS" protocol. Images can be self-hosted by the seller, or sellers can
     * use the <a href="/Devzone/XML/docs/Reference/eBay/UploadSiteHostedPictures.html"
     * target="_blank">UploadSiteHostedPictures</a> call of the Trading API to upload
     * images to an eBay Picture Server. If successful, the response of the
     * <a href="/Devzone/XML/docs/Reference/eBay/UploadSiteHostedPictures.html"
     * target="_blank">UploadSiteHostedPictures</a> call will contain a full URL to the
     * image on an eBay Picture Server. This is the URL that will be passed in through
     * the <strong>imageUrls</strong> array. <br><br>
     *
     * Before any offer can be published, at least one image must exist for the offer.
     * Links to images can either be passed in through this <strong>imageUrls</strong>
     * container, or they can be passed in through the <strong>product.imageUrls</strong>
     * container when creating each inventory item in the group. If the
     * <strong>variesBy.aspectsImageVariesBy</strong> field is used to specify the main
     * product aspect where the variations vary, the links to the images must be passed
     * in through this <strong>imageUrls</strong> container, and there should be a picture
     * for each variation. So, if the <strong>variesBy.aspectsImageVariesBy</strong> field
     * is set to <code>Color</code>, a link should be included to an image demonstrating
     * each available color in the group.<br><br>
     *
     * In almost any category at no cost, sellers can include up to 24 pictures in one
     * listing. For inventory items that are a part of an inventory item group/multiple-variation
     * listings, a maximum of 12 pictures may be used per inventory item in the group.
     * Motor vehicle listings are an exception. The number of included pictures in motor
     * vehicle listings depend on the selected vehicle package (see
     * <a href="https://www.ebay.com/help/selling/fees-credits-invoices/motors-fees?id=4127"
     * target="_blank">Fees for selling vehicles on eBay Motors</a>).<br><br>
     *
     * This container will always be returned for an inventory item group that has at
     * least one published offer since a published offer will always have at least one
     * picture, but this container will only be returned if defined for inventory item
     * groups that have yet to have any published offers.
     *
     * @var string[]
     */
    #[Assert\Type('array')]
    public ?array $imageUrls = null;

    /** This is the unique identifier of the inventory item group. This identifier is created by the seller when an inventory item group is created. This field is only applicable to the <strong>getInventoryItemGroup</strong> call and not to the <strong>createOrReplaceInventoryItemGroup</strong> call. In the <strong>createOrReplaceInventoryItemGroup</strong> call, the <strong>inventoryItemGroupKey</strong> value is passed into the end of the call URI instead. */
    #[Assert\Type('string')]
    public ?string $inventoryItemGroupKey = null;

    /** A subtitle is an optional listing feature that allows the seller to provide more information about the product, possibly including keywords that may assist with search results. An additional listing fee will be charged to the seller if a subtitle is used. For more information on using listing subtitles on the US site, see the <a href="https://pages.ebay.com/help/sell/itemsubtitle.html " target="_blank">Adding a subtitle to your listings</a> help page. <br><br><span class="tablenote"> <strong>Note:</strong> Since this subtitle will ultimately  become the subtitle in a multiple-variation listing, the seller should not include the <strong>subtitle</strong> field when creating the inventory items that are members of the group. If they do include the <strong>subtitle</strong> field in an inventory item record, the text in that field will overwrite the text provided in this <strong>subtitle</strong> field for each inventory item in the group that is published.</span><br><br>This field will only be returned if set for an inventory item.<br><br><strong>Max Length</strong>: 55<br> */
    #[Assert\Type('string')]
    public ?string $subtitle = null;

    /** The title of the inventory item group. This title will ultimately become the listing title once the first offer of the group is published. This field is not initially required when first creating an inventory item group, but will be required before the first offer of the group is published.<br><br><span class="tablenote"> <strong>Note:</strong> Since this title will ultimately  become the listing title in a multiple-variation listing, the seller should omit the <strong>title</strong> field when creating the inventory items that are members of the group. If they do include the <strong>title</strong> field in an inventory item record, the text in that field will overwrite the text provided in this <strong>title</strong> field for each inventory item in the group that is published.</span><br><br> This field is always returned if one or more offers associated with the inventory item group have been published, and is only returned if set for an inventory item group if that group has yet to have any offers published.<br><br><strong>Max Length</strong>: 80 <br> */
    #[Assert\Type('string')]
    public ?string $title = null;

    /**
     * This required container is used to assign individual inventory items to the
     * inventory item group. Multiple SKU values are passed in to this container. If
     * updating an existing inventory item group, the seller should make sure that
     * all member SKU values are passed in, as long as the seller wants that SKU to
     * remain in the group.<br><br>
     *
     * It is also possible to add or remove SKUs with a <strong>createOrReplaceInventoryItemGroup</strong>
     * call. If the seller wants to remove a SKU from the group, that seller will just
     * omit that SKU value from this container to remove that inventory item/SKU from
     * the inventory item group and any published, multiple-variation listing. However,
     * a variation cannot be removed from the group if that variation has one or more
     * sales for that listing. A workaround for this is to set that variation's quantity
     * to <code>0</code> and it will be 'grayed out' in the View Item page.<br><br>
     *
     * This container is always returned.
     * @var string[]
     */
    #[Assert\Type('array')]
    public array $variantSKUs;

    /**
     * This container is used to specify product aspects for which variations within
     * an inventory item group vary, and a complete list of all those variances. For
     * example, t-shirts in an inventory item group may be available in multiple sizes
     * and colors. If this is the case, <code>Color</code> and <code>Size</code> would
     * both be values in the <strong>specifications.name</strong> fields, and the available
     * colors and sizes would be values under the corresponding <strong>specifications.values</strong>
     * array. If the seller will be including multiple images in the listing that will
     * demonstrate how each variation differs, that seller will also include the
     * <strong>aspectsImageVariesBy</strong> field, and call out the product aspect where
     * the listing images differ. In the t-shirts example, this product aspect would
     * be <code>Color</code>, and the seller could either include URLs to images of the
     * t-shirt (in available colors) through the inventory item group entity, or the
     * seller could also included URLs to images of the t-shirt through the individual
     * inventory item entities of the group.<br><br>
     *
     * This container is not initially required when first creating an inventory item
     * group, but the <strong>variesBy.specifications</strong> container will be required
     * before the first offer of the group is published.<br><br>
     *
     * This container is always returned if one or more offers associated with the
     * inventory item group have been published, and is only returned if set for an
     * inventory item group if that group has yet to have any offers published.
     *
     * @var VariesBy|null
     */
    #[Assert\Type(VariesBy::class)]
    public ?VariesBy $variesBy = null;

    /**
     * An array of one or more VideoId values for the inventory item group. A VideoId
     * is a unique identifier that is automatically created by eBay when a seller
     * successfully uploads a video to eBay using the
     * <a href="/api-docs/commerce/media/resources/video/methods/uploadVideo" target="_blank">uploadVideo</a>
     * method of the <a href="/api-docs/commerce/media/overview.html" target="_blank">Media API</a>.<br><br>
     *
     * For information on supported marketplaces and platforms, as well as other
     * requirements and limitations of video support, please refer to
     * <a href="/api-docs/sell/static/inventory/managing-video-media.html" target="_blank">Managing videos</a>.
     *
     * @var string[]
     */
    #[Assert\Type('array')]
    public ?array $videoIds = null;
}
