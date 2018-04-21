<?php
require_once DIR_INPUT . 'FromDb.php';
/**
 * Description of ChooseRandomly
 *
 * @author usfuprog
 */
class ChooseRandomly extends FromDb
{
    public function getData(StarterInput $divingObject)
    {
//        parent::__construct();
        eee("chooran", __FILE__, __LINE__);
//        eee(static::$wrapObj->getFormSett("wordsCnt"), __FILE__, __LINE__);
        $countWords = static::$wrapObj->getFormSett("wordsCnt");
        $wrondTranslate = static::$wrapObj->getFormSett("badTranslation");
        eee($countWords . " ___ " . $wrondTranslate . " ___ ", __FILE__, __LINE__);
        $res1 = self::$db->query(2, $countWords, "fra");
        eee($res1, __FILE__, __LINE__);
        $pearlOne = self::$db->query(3, $countWords);
        eee($pearlOne, __FILE__, __LINE__);
        $pearlTwo = self::$db->query(4, $countWords, $pearlOne);
        eee($pearlTwo, __FILE__, __LINE__);
        
        $divingObject->defaultEngFraWords = $pearlOne;
        $divingObject->badTranslation = $pearlTwo;
        $divingObject->all = $this->mergeInOneArr($pearlOne, $pearlTwo);
        $divingObject->all = $this->finalRotate($divingObject->all);
        eee($pearlTwo, __FILE__, __LINE__);
    }
    
}
