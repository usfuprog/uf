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
        eee(static::$wrapObj->getFormSett("wordsCnt"), __FILE__, __LINE__);
    }
    
}
