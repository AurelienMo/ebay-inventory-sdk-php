<?php

namespace SapientPro\EbayInventorySDK\Enums;

enum ShippingServiceTypeEnum: string
{
    /** This enumeration value indicates that the shipping service option whose shipping costs will be overridden is a domestic shipping service. */
    case DOMESTIC = 'DOMESTIC';

    /** This enumeration value indicates that the shipping service option whose shipping costs will be overridden is an international shipping service. */
    case INTERNATIONAL = 'INTERNATIONAL';
}
