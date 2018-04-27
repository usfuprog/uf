<?php
require_once 'Starter.php';
require_once DIR_ALGO . 'Algo1.php';
require_once DIR_ALGO . 'Algo2.php';
require_once DIR_ALGO . 'Algo3.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StarterAlgo
 *
 * @author usfuprog
 */

class StarterAlgo extends Starter 
{
    private $obj;
    protected static $sett;
    
    public function __construct($settIn, $wrapperObj) 
    {
        if ($settIn === strval(TPL_ALGO_DEFVAL))return null;
        static::$sett = $settIn;
        
        $this->obj = Starter::getObject(static::$sett);
        $this->obj->setWrapper($wrapperObj);
//        eee($this->obj, __FILE__, __LINE__);
        
//        $this->obj->getData();
    }
    
    public function getAlgoObject()
    {
        return $this->obj;
    }
}
