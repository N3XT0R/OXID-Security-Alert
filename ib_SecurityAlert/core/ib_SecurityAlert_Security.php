<?php

/**
 * Created by PhpStorm.
 * User: N3X-Home
 * Date: 30.06.2016
 * Time: 20:21
 */
class ib_SecurityAlert_Security extends oxSuperCfg{

    protected $_aValidators = [];

    public function __construct(){
        parent::__construct();
        $this->init();
    }

    public function init(){
        $oValidatorRegistry = oxNew("ib_SecurityAlert_ValidatorRegistry");
        $aEntries           = $oValidatorRegistry->getEntries();

        foreach($aEntries as $sEntry){
            $sValidatorEntry    = $sEntry."_Validator";
            $oEntry             = oxNew($sValidatorEntry);

            if($oEntry instanceof ib_SecurityAlert_ValidatorInterface){
               $this->addValidator($oEntry);
            }
        }
    }

    /**
     * Set Validators
     * @param ib_SecurityAlert_ValidatorInterface[] $aValidators
     * @return $this
     */
    public function setValidators(array $aValidators){
        $this->_aValidators = $aValidators;
        return $this;
    }


    public function addValidator(ib_SecurityAlert_ValidatorInterface $oValidator){
        $this->_aValidators[] = $oValidator;
        return $this;
    }

    /**
     * Get Validators
     * @return ib_SecurityAlert_ValidatorInterface[]
     */
    public function getValidators(){
        return $this->_aValidators;
    }

    public function processValidation($sClass = null, $sFunction = null, $aParams = null, $aViewsChain = null){
        $aValidators    = $this->getValidators();


        foreach($aValidators as $oValidator){
            if($sClass){
                $this->_validateClass($oValidator, $sClass);
            }

            if($sFunction){
                $this->_validateFunction($oValidator, $sFunction);
            }

            if(is_array($aParams)){
                $this->_validateParams($oValidator, $aParams);
            }

            if(is_array($aViewsChain)){
                $this->_validateViewsChain($oValidator, $aViewsChain);
            }
        }
    }

    protected function _validateClass(ib_SecurityAlert_ValidatorInterface $oValidator, $sClass){
        $blSecurityRisk = $oValidator->validateString($sClass);
        if($blSecurityRisk == true){
            $this->_sendSecurityAlertMail($oValidator);
        }
    }

    protected function _validateFunction(ib_SecurityAlert_ValidatorInterface $oValidator, $sFunction){
        $blSecurityRisk = $oValidator->validateString($sFunction);
        if($blSecurityRisk == true){
            $this->_sendSecurityAlertMail($oValidator);
        }
    }

    protected function _validateParams(ib_SecurityAlert_ValidatorInterface $oValidator, $aParams){
        $blSecurityRisk = $oValidator->validateArray($aParams);
        if($blSecurityRisk == true){
            $this->_sendSecurityAlertMail($oValidator);
        }
    }

    protected function _validateViewsChain(ib_SecurityAlert_ValidatorInterface $oValidator, $aViewsChain){
        $blSecurityRisk = $oValidator->validateArray($aViewsChain);
        if($blSecurityRisk == true){
            $this->_sendSecurityAlertMail($oValidator);
        }
    }

    protected function _sendSecurityAlertMail(ib_SecurityAlert_ValidatorInterface $oValidator){
        $oEmail         = oxNew("oxEmail");
        $aHeaders       = getallheaders();
        $oConfig        = $this->getConfig();
        $sEmail         = trim($oConfig->getConfigParam("sIbSecurityAlertNotifyMailAddress"));
        $oEmail->sendSecurityAlertMail($sEmail, $oValidator, $aHeaders);
    }
}