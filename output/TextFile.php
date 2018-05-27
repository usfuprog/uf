<?php
require_once DIR_OUTPUT . "OutputMethod.php";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TextFile
 *
 * @author usfuprog
 */
class TextFile extends OutputMethod 
{
    public function dataOut(AlgoMethod $obj)
    {
        eee("DATA IN FILE");
        $fileGo = $obj->wrapperObj->getFormSett("txtFile");
        eee($fileGo);
        if ($fileGo === '')
            return;
        eee(is_dir($fileGo));
        eee(pathinfo($fileGo));
    }
}


?>
