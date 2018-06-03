<?php
require_once DIR_OUTPUT . "OutputExec.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OutputMethod
 *
 * @author usfuprog
 */

abstract class OutputMethod implements OutputExec
{
    public $result = "";
    protected $toFile = "";
    
    public function dataOut(AlgoMethod $obj)
    {
        if (isset($obj->defaultEngFraWords))
        {
            $this->result .= "<p>" . DEFAULT_VALUES . "</p><p>";
            foreach ($obj->defaultEngFraWords as $v)
            {
                $wordPair = $v;
                $this->result .= $wordPair['e'] . " - " . $wordPair['f'] . " ... ";
            }
            $this->result .= "</p>";
        }

        if (isset($obj->all))
        {
            $this->result .= "<p>" . CHOICES_MISTER_ANDERSON . "</p><p>";
            foreach ($obj->all as $v)
            {
                $this->result .= "<ul>";
                $wordPair = $v;
                $this->result .= "<li>" . $wordPair[0] . " (...) " . $wordPair[1] . " ou " . $wordPair[2] . " ... </li>";
                $this->result .= "</ul>";
            }
            $this->result .= "</p>";
        }
    }
    
}
