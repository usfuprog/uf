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
     * Get stdClass object, wich is wrapperObject, in this program this is FormatePlainText, and set static 
     * property of abstract class, more closest to interface in folder, the root of other classes in each 
     * folder. This allow get settings of the form, by public method getFormSett in any class, thats extends 
     * in folders, such as "input", "output", "algo". 
     * @param string $settings, stdClass, $className
     * 
     * @return \className
     * @throws Exception
     */
    public static function getObject($settings)
    {
//        echo " __ " . $settings;
        $className = preg_replace_callback("/^[\w]{1}|[\s]{1}[\w]{1}/", 
                function($match){return strtoupper(trim($match[0]));}, $settings);
        $obj = null;
        if ($className)
            $obj = new $className;
        
        if (!$obj)
            throw new Exception("settings FAIL. No object was created !!! Class: " . $settings);
        
//        $name = preg_replace("/Starter/", "", $callFrom, 1) . "Method";
        
//        if ($name !== "Method" && is_a($obj, $name))
//            $obj->setWrapObj($wrapperObj);
        
        return $obj;
    }
    
    /**
     * Return raw settings, as they was entered on the page. Different settings for each Starter*.php.
     * 
     * @return string
     */
    public static function getSett()
    {
        return static::$sett;
    }
}
