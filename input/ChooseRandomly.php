<?php
require_once DIR_INPUT . 'FromDb.php';
/**
 * Description of ChooseRandomly
 *
 * @author usfuprog
 */
class ChooseRandomly extends FromDb
{
    public function getData(AlgoMethod $divingObject)
    {
//        parent::__construct();
//        eee("chooran", __FILE__, __LINE__);
//        eee(static::$wrapObj->getFormSett("wordsCnt"), __FILE__, __LINE__);
        $countWords = $divingObject->wrapperObj->getFormSett("wordsCnt");
        $wrongTranslate = $divingObject->wrapperObj->getFormSett("badTranslation");
//        eee($countWords . " ___ " . $wrongTranslate . " ___ ", __FILE__, __LINE__);
//        $res1 = self::$db->query(2, $countWords, "fra");
//        eee($res1, __FILE__, __LINE__);
        $pearlOne = self::$db->query(3, $countWords);
//        eee($pearlOne, __FILE__, __LINE__);
        if ($wrongTranslate === 'db')
            $pearlTwo = self::$db->query(4, $countWords, $pearlOne);
        else 
            $pearlTwo = $divingObject->makeFakeFromSelected($pearlOne);
//        eee($pearlTwo, __FILE__, __LINE__);
        
        $divingObject->defaultEngFraWords = $pearlOne;
        $divingObject->badTranslation = $pearlTwo;
        $divingObject->all = $divingObject->mergeInOneArr($pearlOne, $pearlTwo);
        $divingObject->all = $divingObject->finalRotate($divingObject->all);
//        eee($divingObject->all, __FILE__, __LINE__);
//        $divingObject->all = $divingObject->finalRotate($divingObject->all);
        
//        eee($pearlTwo, __FILE__, __LINE__);
    }
    
}
