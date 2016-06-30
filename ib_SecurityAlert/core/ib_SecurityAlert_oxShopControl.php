<?php

/**
 * Created by PhpStorm.
 * User: N3X-Home
 * Date: 30.06.2016
 * Time: 20:14
 */
class ib_SecurityAlert_oxShopControl extends ib_SecurityAlert_oxShopControl_parent{

    protected function _process($sClass = null, $sFunction = null, $aParams = null, $aViewsChain = null){
        $oIBSecurity    = oxNew("ib_SecurityAlert_Security");
        $oIBSecurity->processValidation($sClass, $sFunction, $aParams, $aViewsChain);
        return parent::_process($sClass, $sFunction, $aParams, $aViewsChain);
    }
}