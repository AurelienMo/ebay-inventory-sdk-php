<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;

/**
 * This type is used to express detailed information on errors and warnings that may occur with a call request.
 */
class Error implements EbayModelInterface
{
    use FillsModel;

    /** This string value indicates the error category. There are three categories of errors: request errors, application errors, and system errors. */
    public string $category;

    /** The name of the domain in which the error or warning occurred. */
    public string $domain;

    /** A unique code that identifies the particular error or warning that occurred. Your application can use error codes as identifiers in your customized error-handling algorithms. */
    public int $errorId;

    /**
     * An array of one or more reference IDs which identify the specific request element(s)
     * most closely associated to the error or warning, if any.
     * @var string[]
     */
    public array $inputRefIds;

    /** A detailed description of the condition that caused the error or warning, and information on what to do to correct the problem. */
    public string $longMessage;

    /** A description of the condition that caused the error or warning. */
    public string $message;

    /**
     * An array of one or more reference IDs which identify the specific response element(s)
     * most closely associated to the error or warning, if any.
     * @var string[]
     */
    public array $outputRefIds;

    /**
     * Various warning and error messages return one or more variables that contain contextual information
     * about the error or waring.
     * This is often the field or value that triggered the error or warning.
     * @var ErrorParameter[]
     */
    public array $parameters;

    /** The name of the subdomain in which the error or warning occurred. */
    public string $subdomain;
}
