<?php

/**
 * Created by PhpStorm.
 * User: N3X-Home
 * Date: 30.06.2016
 * Time: 21:04
 */
class ib_SecurityAlert_oxemail extends ib_SecurityAlert_oxemail_parent{

    protected $_sSecurityAlertEmail         = "ib_SecurityAlert_NotifyMail.tpl";
    protected $_sSecurityAlertEmailPlain    = "ib_SecurityAlert_NotifyMail_plain.tpl";


    public function sendSecurityAlertMail($sEmail, ib_SecurityAlert_ValidatorInterface $oValidator, array $aHeaders){

        $oShop = $this->_getShop();
        $this->_setMailParams($oShop);

        // create messages
        $oSmarty = $this->_getSmarty();
        $this->setViewData("oValidator", $oValidator);
        $this->setViewData("aHeaders", $aHeaders);

        $this->setBody($oSmarty->fetch($this->_sSecurityAlertEmail));
        $this->setAltBody($oSmarty->fetch($this->_sSecurityAlertEmailPlain));
        $this->setSubject();
        $this->setRecipient($sEmail);
        return $this->send();
    }

}