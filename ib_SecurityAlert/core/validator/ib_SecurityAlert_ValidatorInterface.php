<?php

/**
 * Created by PhpStorm.
 * User: N3X-Home
 * Date: 30.06.2016
 * Time: 20:29
 */
interface ib_SecurityAlert_ValidatorInterface {


    public function validateArray(array $aInput);

    public function validateString($sInput);
}