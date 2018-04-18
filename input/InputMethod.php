<?php
require_once 'InputExec.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InputMethod
 *
 * @author usfuprog
 */

abstract class InputMethod implements InputExec
{
    protected static $wrapObj;
    
    static public function setWrapObj(\stdClass $obj) 
    {
        static::$wrapObj = $obj;
        eee("HURA INPUT", __FILE__, __LINE__);
    }
}
