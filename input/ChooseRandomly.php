<?php
require_once DIR_INPUT . 'FromDb.php';
/**
 * Description of ChooseRandomly
 *
 * @author usfuprog
 */
class ChooseRandomly extends FromDb
{
    public function getData()
    {
//        parent::__construct();
        eee("chooran", __FILE__, __LINE__);
//        eee(static::$wrapObj->getFormSett("wordsCnt"), __FILE__, __LINE__);
        $countWords = static::$wrapObj->getFormSett("wordsCnt");
        $wrondTranslate = static::$wrapObj->getFormSett("badTranslation");
        eee($countWords . " ___ " . $wrondTranslate . " ___ ", __FILE__, __LINE__);
        $res = self::$db->query(2, $countWords, $wrondTranslate);
        eee($res, __FILE__, __LINE__);
    }
    
}
