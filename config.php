<?php
//
DEFINE('TPL_INPUT_NAME', 'inp');
DEFINE('TPL_INPUT_DEFVAL', 0);
//
DEFINE('TPL_OUTPUT_NAME', 'out');
DEFINE('TPL_OUTPUT_DEFVAL', 0);
//
DEFINE('TPL_ALGO_NAME', 'algo');
DEFINE('TPL_ALGO_DEFVAL', 0);
//
DEFINE('DIR_INPUT', 'input/');
DEFINE('DIR_OUTPUT', 'output/');
DEFINE('DIR_ALGO', 'algo/');
DEFINE('DIR_DB', 'db4ever/');
//
DEFINE('DB_NAME', 'engfra');//        <<<      if go out 
DEFINE('DB_USER', 'qser');//          <<<
DEFINE('DB_HOST', 'localhost');//     <<<
DEFINE('DB_PASS', 'qser');//          <<<
DEFINE('MAINTAIN', false);//          <<<      if go out 
//
DEFINE('CHOICES_MISTER_ANDERSON', 'Le choix, monsieur Anderson ... ');//write values on your language
DEFINE('DEFAULT_VALUES', 'Le défaut valeurs ... ');//write values on your language


DEFINE('PEVNYJ_LINK', '/');
DEFINE('USER_FOLDER', 'userdata');
//
/**
 * 
 * @param type $mixed
 * @param type $string
 * @param type $string
 * 
 * This function reflect variable value, file and line, where it was call. Variable can be scalar or not, and this 
 * function add <br> elements on both sides of echo, for better reading on html page.
 */
function eee($var, $file = null, $line = null)
{
//    return;
    if (!MAINTAIN)
    {
        if (!is_scalar($var))
            return;
        $file = $line = null;
    }
    
    $file = str_replace("\\", "/", $file);
    echo "<br>" . 
            str_pad(implode(preg_split("/^[\/|\w].*[\/{1}]/", $file, -1)), 100, ".", STR_PAD_LEFT) . 
            " : " . $line . " : " . str_pad($file, 75, "~", STR_PAD_LEFT) . "<br>[";//                   "/[/]+[\w|\.]*$/"
    if (is_bool($var) === true && $var)$var = "true";
    if (is_bool($var) === true && !$var)$var = "false";
        
    echo is_scalar($var) ? nl2br($var) : var_export($var, true);
//    echo "________<br>";
//    echo is_scalar($var) ? nl2br($var) : var_dump($var);
    
    echo "]<br>";
}