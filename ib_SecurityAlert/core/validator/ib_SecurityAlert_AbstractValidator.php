<?php

/**
 * Created by PhpStorm.
 * User: N3X-Home
 * Date: 30.06.2016
 * Time: 21:37
 */
abstract class ib_SecurityAlert_AbstractValidator implements ib_SecurityAlert_ValidatorInterface{

    protected $_aMatchRules = [];
    protected $_sType;

    /**
     * Get Match-Rules
     * @return array
     */
    public function getMatchRules(){
        return $this->_aMatchRules;
    }

    /**
     * Set Match-Rules
     * @param array $aMatchRules
     * @return $this
     */
    public function setMatchRules(array $aMatchRules){
        $this->_aMatchRules = $aMatchRules;
        return $this;
    }

    /**
     * Get Attack-Type
     * @return mixed
     */
    public function getType(){
        return $this->_sType;
    }

    /**
     * Set Attack-Type
     * @param $sType Type of Attack
     * @return $this
     */
    public function setType($sType){
        $this->_sType   = $sType;
        return $this;
    }

    /**
     * @param array $aInput
     * @return bool
     */
    public function validateArray(array $aInput) {
        $blResult = false;
        foreach($aInput as $sInput){
            $blResult = $this->validateString($sInput);
            if($blResult == true){
                break;
            }
        }

        return $blResult;
    }

    /**
     * @param $sInput
     * @return bool
     */
    public function validateString($sInput) {
        $blResult   = false;
        $aRules     = $this->getMatchRules();

        foreach($aRules as $sRule){
            $sRegExRule = "/".$sRule."/";
            if(preg_match($sRegExRule, $sInput)){
                $blResult   = true;
                break;
            }
        }

        return $blResult;
    }


}