<?php
require_once 'Starter.php';
require_once DIR_OUTPUT . 'Html.php';
require_once DIR_OUTPUT . 'TextFile.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StarterOutput
 *
 * @author usfuprog
 */

class StarterOutput extends Starter 
{
    private $obj;
    protected static $sett;
    
    public function __construct($settIn) 
    {
        if ($settIn === strval(TPL_OUTPUT_DEFVAL))return null;
        static::$sett = $settIn;
        
        $this->obj = Starter::getObject(static::$sett);
        eee($this->obj, __FILE__, __LINE__);
        
    }
    
}
