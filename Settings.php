<?php
require_once 'config.php';


/**
 * Description of Settings
 * This class call by sprintf from outer code. It is return string, that contains actual settings. If there is no 
 * settings in POST or GET method, class will return default settings, using constants from config.php
 * @author usfuprog
 */
class Settings extends stdClass
{
    private $sett = "";
    
    /**
     * Call function that will find POST or GET settings, or if they dont exists, create default settings
     * @return type string
     */
    public function __toString() 
    {
        $this->postGetSettings();
        !$this->sett && $this->defaultSettings();            
        
        return $this->sett;
    }
    /**
     * @param string
     * String $sett contains settings for all classes. This function extract settings to the class, that is 
     * defined by variable $class. Each class identify by constant from config.php. Also it can return raw 
     * settings for all classes in string.
     * @return string
    */
    public function getSettings($class = null)
    {
//        eee($this->sett, __FILE__, __LINE__);
        if (!$class)
            return $this->sett;
        
        $localSett = explode(";", $this->sett);
//        eee($localSett, __FILE__, __LINE__);
        $localSett = preg_grep("/$class\s?=\s?[^;]+/", $localSett);
//        eee($localSett, __FILE__, __LINE__);
        $localSett = preg_replace("/[\s]*$class\s?=\s?/", "", current($localSett));//$localSett = last
        //$localSett = preg_replace(array("/[^out]{3}|\w+\s=\s[^;]+/", "//"), "", $sett);//!
        return $localSett;
    }
    /**
     * Put settings from POST or GET in to the variable $sett. If they exists.
     */
    private function postGetSettings()
    {
        $get = filter_input_array(INPUT_GET);
        $post = filter_input_array(INPUT_POST);
//        printf('%1$32b %2$32b <br>', $get, $post);
        $tmp = $post ? $post : ($get ? $get : null);
        
        if (!$tmp)return;
        
//        eee($tmp, __FILE__, __LINE__);
        foreach ($tmp as $k => $v)
        {
            $this->sett .= "$k = $v; ";
        }
    }
    
    /**
     * Create default settings using constants in config.php
     */
    private function defaultSettings()
    {
        $this->sett = sprintf('%1$s = %2$s; %3$s = %4$s; %5$s = %6$s;', 
                TPL_INPUT_NAME, TPL_INPUT_DEFVAL, TPL_ALGO_NAME, TPL_ALGO_DEFVAL, TPL_OUTPUT_NAME, TPL_OUTPUT_DEFVAL);
    }
    
}