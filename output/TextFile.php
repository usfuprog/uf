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
        $fileGo = $this->fileMustExist($obj->wrapperObj->getFormSett("txtFile"));
        if ($fileGo === null)
        {
            $this->result = "ERROR: FILE NAME ARE EMPTY OR INCORRECT" . $fileGo;
            return;
        }
        $this->result = "DATA IN FILE >> " . $fileGo;
    }
    /**
     * 
     * @param string $fileName
     * @return string
     */
    private function fileMustExist($fileGo)
    {
        $name = '';
        eee($fileGo);
        if ($fileGo === '')
            return;
        eee(is_dir($fileGo));
        eee(pathinfo($fileGo));
        eee(ini_get('error_log'));
        eee(__DIR__);
        
        $fileNameToRec = ini_get('error_log');
        
        return $fileNameToRec;
    }
}


?>
