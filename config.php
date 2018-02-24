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
function eee($var, $file, $line)
{
    echo "<br>" . $file . " : " . $line . " : <br>[";
    
    if (is_scalar($var))
        echo nl2br($var);
    else
        var_dump($var);
    
    echo "]<br>";
}