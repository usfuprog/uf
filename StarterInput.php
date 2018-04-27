<?php
require_once 'Starter.php';
require_once DIR_INPUT . 'ChooseRandomly.php';
require_once DIR_INPUT . 'SelectManualy.php';
require_once DIR_INPUT . 'WriteManualy.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StarterInput
 *
 * @author usfuprog
 */

class StarterInput extends Starter 
{
    private $obj;
    protected static $sett;
    
    public function __construct($settIn, $algoObj) 
    {
        if ($settIn === strval(TPL_INPUT_DEFVAL))return null;
        static::$sett = $settIn;
        
        $this->obj = Starter::getObject(static::$sett);
//        eee(get_class_methods("InputMethod"));
//        eee($this->obj, __FILE__, __LINE__);
        
        $this->obj->getData($algoObj);
    }
    
}
