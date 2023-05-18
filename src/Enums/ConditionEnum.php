<?php

namespace SapientPro\EbayInventorySDK\Enums;

enum ConditionEnum: string
{
    /** This enumeration value indicates that the inventory item is a brand-new, unopened item in its original packaging. This enumeration value should be used if the Condition ID value is 1000. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case NEW = 'NEW';

    /** This enumeration value indicates that the inventory item is in 'like-new' condition. In other words, the item has been opened, but very lightly used if used at all. This condition typically applies to books or DVDs. This enumeration value should be used if the Condition ID value is 2750. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case LIKE_NEW = 'LIKE_NEW';

    /** This enumeration value indicates that the inventory item is a new, unused item, but it may be missing the original packaging or perhaps not sealed. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 1500. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case NEW_OTHER = 'NEW_OTHER';

    /** This enumeration value indicates that the inventory item is a new, unused item, but it has defects. This item condition is typically applicable to clothing or shoes that may have scuffs, hanging threads, missing buttons, etc. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 1750. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case NEW_WITH_DEFECTS = 'NEW_WITH_DEFECTS';

    /** This enumeration value should no longer be used, as the 'Manufacturer Refurbished' item condition is no longer a valid item condition on any eBay marketplace. */
    case MANUFACTURER_REFURBISHED = 'MANUFACTURER_REFURBISHED';

    /** This enumeration value indicates that the inventory item is in pristine, like-new condition and has been inspected, cleaned and refurbished by the manufacturer or a manufacturer-approved vendor. The item will be in new packaging with original or new accessories. This enumeration value should be used if the Condition ID value is 2000. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case CERTIFIED_REFURBISHED = 'CERTIFIED_REFURBISHED';

    /** This enumeration value indicates that the inventory item is in like new condition and has been inspected, cleaned, and refurbished by the manufacturer or a manufacturer-approved vendor. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 2010. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case EXCELLENT_REFURBISHED = 'EXCELLENT_REFURBISHED';

    /** This enumeration value indicates that the inventory item shows minimal wear and has been inspected, cleaned, and refurbished by the manufacturer or a manufacturer-approved vendor. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 2020. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case VERY_GOOD_REFURBISHED = 'VERY_GOOD_REFURBISHED';

    /** This enumeration value indicates that the inventory item shows moderate wear and has been inspected, cleaned, and refurbished by the manufacturer or a manufacturer-approved vendor. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 2030. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case GOOD_REFURBISHED = 'GOOD_REFURBISHED';

    /** This enumeration value indicates that the inventory item has been restored to working order by the eBay seller or a third party. This means the item was inspected, cleaned, and repaired to full working order and is in excellent condition. This item may or may not be in original packaging. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 2500. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case SELLER_REFURBISHED = 'SELLER_REFURBISHED';

    /** This enumeration value indicates that the inventory item is used but in excellent condition. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 3000. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case USED_EXCELLENT = 'USED_EXCELLENT';

    /** This enumeration value indicates that the inventory item is used but in very good condition. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 4000. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case USED_VERY_GOOD = 'USED_VERY_GOOD';

    /** This enumeration value indicates that the inventory item is used but in good condition. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 5000. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case USED_GOOD = 'USED_GOOD';

    /** This enumeration value indicates that the inventory item is in acceptable condition. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 6000. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case USED_ACCEPTABLE = 'USED_ACCEPTABLE';

    /** This enumeration value indicates that the inventory item is not fully functioning as originally designed. A buyer will generally buy an item in this condition knowing that the item will need to be repaired, or a buyer will buy that item just to use one or more of the parts/components that comprise the item. When a seller specifies this condition for an item, that seller should also provide a more detailed explanation of the item's condition in the conditionDescription field. This enumeration value should be used if the Condition ID value is 7000. Condition ID values are used in both the Trading and Metadata APIs to indicate item condition. */
    case FOR_PARTS_OR_NOT_WORKING = 'FOR_PARTS_OR_NOT_WORKING';
}
