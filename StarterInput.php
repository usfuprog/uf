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
 * Description of SelectManualy
 *
 * @author usfuprog
 */

class StarterInput extends Starter 
{
    private $sett, $obj;
    
    public function __construct($settIn) 
    {
        if ($settIn === strval(TPL_INPUT_DEFVAL))return null;
        $this->sett = $settIn;
        
        $this->obj = Starter::getObject($this->sett);
        eee($this->obj, __FILE__, __LINE__);
        
//        $this->obj->getData();
    }
    
    
}
