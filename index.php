<?php
require_once 'Settings.php';

class FormatePlainText extends Settings
{
    public function __construct($num)
    {
        $sett = new Settings;
        echo " " . CONSTVAR / 10;
    }
    
}


//error_reporting(E_ALL & ~E_WARNING);
try
{
    $obj = new FormatePlainText(5);
} catch (Exception $ex) {

echo $ex->getCode();

}


