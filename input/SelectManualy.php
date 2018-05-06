<?php
require_once DIR_INPUT . 'FromDb.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SelectManualy
 *
 * @author usfuprog
 */
class SelectManualy extends FromDb 
{
    private $words;
    
    public function __construct() 
    {
        $this->words = array();
        foreach(array_keys($_REQUEST) as $k)
        {
            if (preg_match("/^wrd[\w\s]+/", $k))
                    {
                        $this->words[preg_replace("/wrd/", "", $k, 1)] = $_REQUEST[$k];
//                        eee(preg_replace("/wrd/", "", $k, 1), __FILE__, __LINE__);
                    }
        }
//        eee($words, __FILE__, __LINE__);
//        self::$db->query(5, $words);
        parent::__construct();
    }
    
    /**
     * Get all words from the form, that was select by user
     */
    public function getData(AlgoMethod $divingObject)
    {
        $countWords = count($this->words);
        if (!$countWords)return 0;
        
        $wrongTranslate = $divingObject->wrapperObj->getFormSett("badTranslation");
//        eee($this->words, __FILE__, __LINE__);
        $pearlOne = [];
        foreach ($this->words as $k => $v)
        {
            $pearlOne[] = array('e'=>$k, 'f'=>$v);
        }
//        eee($pearlOne, __FILE__, __LINE__);
        
        if ($wrongTranslate === 'db')
            $pearlTwo = self::$db->query(4, $countWords, $pearlOne);
        else 
            $pearlTwo = $divingObject->makeFakeFromSelected($pearlOne);
        
        $divingObject->defaultEngFraWords = $pearlOne;
        $divingObject->badTranslation = $pearlTwo;
        $divingObject->all = $divingObject->mergeInOneArr($pearlOne, $pearlTwo);
        $divingObject->all = $divingObject->finalRotate($divingObject->all);
    }
    
}
