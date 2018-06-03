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
//        eee("DATA IN FILE");
        $fileGo = $this->fileMustExist($obj->wrapperObj->getFormSett("txtFile"));
        if ($fileGo === null)
        {

            $this->result = "ERROR: FILE NAME ARE EMPTY OR INCORRECT" . $fileGo . " _____" . $this->toFile . "<br>";
            return;
        }
        
        
        parent::dataOut($obj);
        $this->result .= PHP_EOL;
//        $countBytes = fwrite($fileGo, $this->result);
        $this->result = preg_replace('/<[^>]+>/', '', $this->result);
        
        $countBytes = fwrite($fileGo, $this->result);
        if ($countBytes)
            $this->result = "DATA IN FILE >> " . $this->toFile;
        else
            $this->result = "ERROR: CAN NOT WRITE IN FILE " . $fileGo . " _____" . $this->toFile . "<br>";
    }
    /**
     * 
     * @param string $fileName
     * @return string
     */
    private function fileMustExist($fileGo)
    {
        $handler = null;
//        eee($fileGo);
        if ($fileGo === '' || is_dir($fileGo))
            return null;
//        eee(is_dir($fileGo));
//        eee(pathinfo($fileGo));
//        eee(ini_get('error_log'));
//        eee(__DIR__);
        $info = pathinfo($fileGo);
        
        if ($info['dirname'] != '.' && isset($info['filename']))
        {
//            eee($info, __FILE__, __LINE__);
            $this->toFile = $fileGo;
//            $handler = fopen($fileGo, 'w');
        }
        
        if ($info['dirname'] == '.')
        {
            $logDir = pathinfo(ini_get('error_log'))['dirname'];
            
            $dirname = $logDir ? $logDir : str_replace('\\', '/', dirname(__DIR__));
//            eee(realpath(__DIR__));
//            eee($dirname);
            $this->toFile = $dirname . '/' . $info['filename'];
            if (isset($info['extension']))
                $this->toFile .= "." . $info['extension'];
        }
        
//        if (file_exists($this->toFile))
//        {
//            $this->result = "CAN NOT WRITE TO FILE: FILE ALREADY EXISTS";
//            return;
//        }
        
        $handler = fopen($this->toFile, 'w');
        
        
        return $handler;
    }
}


?>
