<?php

namespace EBay\Inventory\Enum;

/**
 * This enumeration type is used to specify/indicate whether the shipping service option whose shipping costs will be overridden is a domestic or an international shipping service.
 */
final class ShippingServiceTypeEnum
{
    /** @var string This enumeration value indicates that the shipping service option whose shipping costs will be overridden is a domestic shipping service. */
    public const DOMESTIC = 'DOMESTIC';
    /** @var string This enumeration value indicates that the shipping service option whose shipping costs will be overridden is an international shipping service. */
    public const INTERNATIONAL = 'INTERNATIONAL';
}
