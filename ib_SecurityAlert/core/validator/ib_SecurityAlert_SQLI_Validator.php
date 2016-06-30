<?php

/**
 * Created by PhpStorm.
 * User: N3X-Home
 * Date: 30.06.2016
 * Time: 20:36
 */
class ib_SecurityAlert_SQLI_Validator extends ib_SecurityAlert_AbstractValidator{

    protected $_aMatchRules = [
        //error-based:
        ' order by \d+',
        '\+order\+by\+\d+',
        '%20order%20by%20\d+',
        'unhex\(hex\((.*)\)',
        //Blind:
        ' and \d+=\d+',
        '\+and\+\d+=\d+',
        //time-based:
        'BENCHMARK\(\d+,ENCODE\((.*)\)\)',
    ];
    
}