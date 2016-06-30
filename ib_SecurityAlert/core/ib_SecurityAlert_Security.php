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
        $oEmail         = oxNew("oxEmail");

        foreach($aValidators as $oValidator){
            if($sClass){
                $this->_validateClass($oValidator, $oEmail, $sClass);
            }

            if($sFunction){
                $this->_validateFunction($oValidator, $oEmail, $sFunction);
            }

            if($aParams){

            }

            if($aViewsChain){

            }

        }

    }

    protected function _validateClass(ib_SecurityAlert_ValidatorInterface $oValidator, oxEmail $oEmail, $sClass){
        $blSecurityRisk = $oValidator->validateString($sClass);

        if($blSecurityRisk == true){
            $oEmail->sendSecurityAlertMail();
        }

    }

    protected function _validateFunction(ib_SecurityAlert_ValidatorInterface $oValidator, oxEmail $oEmail,  $sFunction){
        $blSecurityRisk = $oValidator->validateString($sFunction);

        if($blSecurityRisk == true){
            $aHeaders   = getallheaders();
            $oEmail->sendSecurityAlertMail();
        }
    }

}