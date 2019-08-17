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
//        echo isset($info['extension']) ? $info['extension'] : "not set now";
        if (!isset($info['extension']) || $info['extension'] != 'txt')$info['extension'] = 'txt';
//        $info['dirname'] = '../' . USER_FOLDER;
//        echo $info['dirname'] . "________" . $info['filename'] . "__________ ." . $info['extension'];
//        $this->toFile = $dirname . '/' . $info['filename'];
        if (defined('USER_FOLDER') && is_dir('../' . USER_FOLDER))
          $info['dirname'] = '../' . USER_FOLDER . "/";
        else
          $info['dirname'] = "";
//        echo $info['dirname'] . "________" . $info['filename'] . "__________ ." . $info['extension'];
        
//        eee(defined('USER_FOLDER'), __FILE__, __LINE__);
        
        $this->toFile =  $info['dirname'] . $info['filename'] . "." . $info['extension'];
//        if (file_exists($this->toFile))
//        {
//            $this->result = "CAN NOT WRITE TO FILE: FILE ALREADY EXISTS";
//            return;
//        }
        
//        $webPath = __FILE__;
//        $webPath = explode('\\', $webPath);
//        array_pop($webPath);
//        $webPath = implode('\\', $webPath) . "\\" . $info['filename'] . (isset($info['extension']) ? "." . $info['extension'] : '');
//        $this->toFile = $webPath;
        
        $handler = fopen($this->toFile, 'w');
        if (file_exists($this->toFile))
        {
            echo "<a href='" . $this->toFile . "' target='_blanc'>Link</a>";
            
        }
        
        return $handler;
    }
}


?>
