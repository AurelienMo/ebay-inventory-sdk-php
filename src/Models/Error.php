<?php

namespace SapientPro\EbayInventorySDK\Models;

use SapientPro\EbayInventorySDK\Models\Concerns\FillsModel;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This type is used to express detailed information on errors and warnings that may occur with a call request.
 */
class Error implements EbayModelInterface
{
    use FillsModel;

    /** This string value indicates the error category. There are three categories of errors: request errors, application errors, and system errors. */
    #[Assert\Type('string')]
    public ?string $category = null;

    /** The name of the domain in which the error or warning occurred. */
    #[Assert\Type('string')]
    public ?string $domain = null;

    /** A unique code that identifies the particular error or warning that occurred. Your application can use error codes as identifiers in your customized error-handling algorithms. */
    #[Assert\Type('int')]
    public ?int $errorId = null;

    /**
     * An array of one or more reference IDs which identify the specific request element(s)
     * most closely associated to the error or warning, if any.
     * @var string[]|null
     */
    #[Assert\Type('array')]
    public ?array $inputRefIds = null;

    /** A detailed description of the condition that caused the error or warning, and information on what to do to correct the problem. */
    #[Assert\Type('string')]
    public ?string $longMessage = null;

    /** A description of the condition that caused the error or warning. */
    #[Assert\Type('string')]
    public ?string $message = null;

    /**
     * An array of one or more reference IDs which identify the specific response element(s)
     * most closely associated to the error or warning, if any.
     * @var string[]|null
     */
    #[Assert\Type('array')]
    public ?array $outputRefIds = null;

    /**
     * Various warning and error messages return one or more variables that contain contextual information
     * about the error or waring.
     * This is often the field or value that triggered the error or warning.
     * @var ErrorParameter[]
     */
    #[Assert\Type('array')]
    public array $parameters;

    /** The name of the subdomain in which the error or warning occurred. */
    #[Assert\Type('string')]
    public ?string $subdomain = null;
}
