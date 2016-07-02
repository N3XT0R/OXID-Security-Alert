<?php

/**
 * Created by PhpStorm.
 * User: N3X-Home
 * Date: 30.06.2016
 * Time: 20:37
 */
class ib_SecurityAlert_LFI_Validator extends ib_SecurityAlert_AbstractValidator{

    protected $_aMatchRules = [
        '..\/',
        '..%2F',
        'config.inc.php',
        'passwd%00',
        'etc\/passwd',
        'etc\/shadow',
    ];
    
    protected $_sType = "Local File Inclusion";
    
}