<?php

/**
 * Created by PhpStorm.
 * User: N3X-Home
 * Date: 30.06.2016
 * Time: 20:34
 */
class ib_SecurityAlert_XSS_Validator extends ib_SecurityAlert_AbstractValidator{

    protected $_aMatchRules = [
        'javascript:alert\((.*)\)',
        '<script>alert\((.*)\)',
        '<script src=(.*)',
    ];

    protected $_sType = "Cross Site Scripting";
}