<?php
/**
 * Created by PhpStorm.
 * User: N3X-Home
 * Date: 30.06.2016
 * Time: 20:06
 */

$sMetadataVersion = "1.1";

$aModule = [
    "id"          => "ib_SecurityAlert",
    "title"       => "OXID-Security-Alert",
    "description" => "Security Alert Module for CE/PE/EE",
    "thumbnail"   => "",
    "version"     => "0.1.0",
    "author"      => "Ilya Beliaev",
    "url"         => "http://blog.php-dev.info",
    "email"       => "info@php-dev.info",
    "extend"      => [
        'oxShopControl'                 => 'ib_SecurityAlert/core/ib_SecurityAlert_oxShopControl',
        'oxEmail'                       => 'ib_SecurityAlert/core/ib_SecurityAlert_oxemail',
    ],
    "files"       => [
        //Core
        'ib_SecurityAlert_Security'                     => 'ib_SecurityAlert/core/ib_SecurityAlert_Security.php',
        'ib_SecurityAlert_ValidatorRegistry'            => 'ib_SecurityAlert/core/ib_SecurityAlert_ValidatorRegistry.php',
        //Core/Validator
        'ib_SecurityAlert_XSS_Validator'                => 'ib_SecurityAlert/core/validator/ib_SecurityAlert_XSS_Validator.php',
        'ib_SecurityAlert_SQLI_Validator'               => 'ib_SecurityAlert/core/validator/ib_SecurityAlert_SQLI_Validator.php',
        'ib_SecurityAlert_LFI_Validator'                => 'ib_SecurityAlert/core/validator/ib_SecurityAlert_LFI_Validator.php',
        'ib_SecurityAlert_RFI_Validator'                => 'ib_SecurityAlert/core/validator/ib_SecurityAlert_RFI_Validator.php',
        'ib_SecurityAlert_AbstractValidator'            => 'ib_SecurityAlert/core/validator/ib_SecurityAlert_AbstractValidator.php',
        //Interfaces
        'ib_SecurityAlert_ValidatorInterface'           => 'ib_SecurityAlert/core/validator/ib_SecurityAlert_ValidatorInterface.php',
    ],
    "settings"    => [
        [
            'group'     => 'main',
            'name'      => 'sIbSecurityAlertNotifyMailAddress',
            'type'      => 'str',
            'value'     => 'info@domain.tld',
        ],
    ],
    "templates"   => [

    ],
    "blocks"      => [

    ],
    "events"      => [

    ],
];
