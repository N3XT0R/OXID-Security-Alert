<?php

/**
 * Created by PhpStorm.
 * User: N3X-Home
 * Date: 30.06.2016
 * Time: 20:43
 */
class ib_SecurityAlert_ValidatorRegistry extends oxSuperCfg{

    protected $_aEntries = [];

    public function __construct() {
        parent::__construct();
        $this->init();
    }

    public function init(){
        $aEntries = [
            'ib_SecurityAlert_LFI',
            'ib_SecurityAlert_RFI',
            'ib_SecurityAlert_SQLI',
            'ib_SecurityAlert_XSS',
        ];
        $this->setEntries($aEntries);
    }

    public function getEntries(){
        return $this->_aEntries;
    }

    public function addEntry($sEntry){
        $this->_aEntries[] = $sEntry;
        return $this;
    }

    public function setEntries(array $aEntries){
        $this->_aEntries = $aEntries;
        return $this;
    }
}