<?php
require_once DIR_OUTPUT . "OutputExec.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OutputMethod
 *
 * @author usfuprog
 */

abstract class OutputMethod implements OutputExec
{
    protected static $wrapObj;
    
    static public function setWrapObj(\stdClass $obj) 
    {
        static::$wrapObj = $obj;
        eee("HURA OUTPUT");
    }
}
