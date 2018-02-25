<?php
require_once DIR_INPUT . 'ChooseRandomly.php';
require_once DIR_INPUT . 'SelectManualy.php';

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

class StarterInput
{
    private $sett, $obj;
    
    public function __construct($settIn) 
    {
        $sett = $settIn;
        eee($sett, __FILE__, __LINE__);
        $obj = new SelectManualy();
    }
    
    
}
