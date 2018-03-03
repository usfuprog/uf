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
//
DEFINE('DIR_DB', 'db4ever/');
DEFINE('DB_PASS', 'qser');
DEFINE('DB_USER', 'qser');
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
    $file = str_replace("\\", "/", $file);
    echo "<br>" . 
            str_pad(implode(preg_split("/^[\/|\w].*[\/{1}]/", $file, -1)), 100, ".", STR_PAD_LEFT) . 
            " : " . $line . " : " . str_pad($file, 75, "~", STR_PAD_LEFT) . "<br>[";//                   "/[/]+[\w|\.]*$/"
        
    echo is_scalar($var) ? nl2br($var) : var_export($var, true);
//    echo "________<br>";
//    echo is_scalar($var) ? nl2br($var) : var_dump($var);
    
    echo "]<br>";
}