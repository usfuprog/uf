<?php
require_once DIR_OUTPUT . "OutputMethod.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Html
 *
 * @author usfuprog
 */
class Html extends OutputMethod 
{
    public function dataOut(AlgoMethod $obj)
    {
        if (isset($obj->defaultEngFraWords))
        {
            echo "<p>" . DEFAULT_VALUES . "</p><p>";
            foreach ($obj->defaultEngFraWords as $v)
            {
                $wordPair = $v;
                echo $wordPair['e'] . " - " . $wordPair['f'] . " ... ";
            }
            echo "</p>";
        }

        if (isset($obj->all))
        {
            echo "<p>" . CHOICES_MISTER_ANDERSON . "</p><p>";
            foreach ($obj->all as $v)
            {
                echo "<ul>";
                $wordPair = $v;
                echo "<li>" . $wordPair[0] . " (...) " . $wordPair[1] . " ou " . $wordPair[2] . " ... </li>";
                echo "</ul>";
            }
            echo "</p>";
        }
    }
}


?>
