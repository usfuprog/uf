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
    
    public function __construct($settIn, $wrapperObj) 
    {
        if ($settIn === strval(TPL_INPUT_DEFVAL))return null;
        static::$sett = $settIn;
        
        $this->obj = Starter::getObject(static::$sett, $wrapperObj, __CLASS__);
        
//        eee(get_class_methods("InputMethod"));
//        eee($this->obj, __FILE__, __LINE__);
        $this->obj->dataOut($wrapperObj);
    }
    /**
     * 
     */
    public function dataOut()
    {
        if ($this->obj)
            return $this->obj->result;
    }
    
}
