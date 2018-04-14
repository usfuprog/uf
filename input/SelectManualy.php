<?php
require_once DIR_INPUT . 'FromDb.php';
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
class SelectManualy extends FromDb//?
{
    public function __construct() 
    {
//        echo __DIR__;
//        echo __FILE__;
//        echo dirname(__FILE__);
    }
    
    /**
     * Get all words from the form, that was select by user
     */
    public function getData()
    {
        $words = array();
        foreach(array_keys($_REQUEST) as $k)
        {
            if (preg_match("/^wrd[\w\s]+/", $k))
                    {
                        $words[preg_replace("/wrd/", "", $k, 1)] = $_REQUEST[$k];
//                        eee(preg_replace("/wrd/", "", $k, 1), __FILE__, __LINE__);
                    }
        }
//        eee($words, __FILE__, __LINE__);
        
    }
    
}
