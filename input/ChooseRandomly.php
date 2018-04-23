        you forget algo1, algo2, algo3   :) :) :) Is it little strange, to create functions in InputMethod.php that 
                calculate results on arrays with data ??????????????????????????????????????????????????????????????

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
//        eee("chooran", __FILE__, __LINE__);
//        eee(static::$wrapObj->getFormSett("wordsCnt"), __FILE__, __LINE__);
        $countWords = static::$wrapObj->getFormSett("wordsCnt");
        $wrongTranslate = static::$wrapObj->getFormSett("badTranslation");
//        eee($countWords . " ___ " . $wrongTranslate . " ___ ", __FILE__, __LINE__);
        $res1 = self::$db->query(2, $countWords, "fra");
//        eee($res1, __FILE__, __LINE__);
        $pearlOne = self::$db->query(3, $countWords);
//        eee($pearlOne, __FILE__, __LINE__);
        if ($wrongTranslate === 'db')
            $pearlTwo = self::$db->query(4, $countWords, $pearlOne);
        else 
            $pearlTwo = $this->makeFakeFromSelected($pearlOne);
//        eee($pearlTwo, __FILE__, __LINE__);
        
        $divingObject->defaultEngFraWords = $pearlOne;
        $divingObject->badTranslation = $pearlTwo;
        $divingObject->all = $this->mergeInOneArr($pearlOne, $pearlTwo);
        $divingObject->all = $this->finalRotate($divingObject->all);
//        eee($divingObject->all, __FILE__, __LINE__);
        $divingObject->all = $this->finalRotate($divingObject->all);
        
//        eee($pearlTwo, __FILE__, __LINE__);
    }
    
}
