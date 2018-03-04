<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class will consolidate all functionality that is the same for all Starters.
 *
 * @author usfuprog
 */
class Starter 
{
    /**
     * Get settings from Starter*.php and return object, of require class, back.
     * 
     * @param type $settings
     * @return \className
     * @throws Exception
     */
    protected static function getObject($settings)
    {
        $className = preg_replace_callback("/^[\w]{1}|[\s]{1}[\w]{1}/", 
                function($match){return strtoupper(trim($match[0]));}, $settings);
        $obj = new $className;
        
        if (!$obj)
            throw new Exception("settings FAIL. No object was created !!! Class: " . $settings);
       
        return $obj;
    }
    
    /**
     * Return raw settings, as they was entered on the page. Different settings for each Starter*.php.
     * 
     * @return type
     */
    public static function getSett()
    {
        return static::$sett;
    }
    
}
