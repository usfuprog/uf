<?php
require_once DIR_INPUT . 'InputMethod.php';
require_once DIR_DB . 'db4ever.php';

/**
 * Description of FromDb
 *
 * @author usfuprog
 */
abstract class FromDb extends InputMethod
{
    public static $db;
    /**
     * Get object of db4ever and save in public static property. All classes that extends from this class, will have 
     * access to public methods of db4ever object.
     */
    public function __construct() 
    {
        $conn = new db4ever();
//        if(rand(0, 1))$conn->closeConnection();
//        $conn->query(2);
        self::$db = $conn->getConnectionObj();
//        eee(get_class(self::$db), __FILE__, __LINE__);
    }
    
    /**
     * 
     * @param array $arr1
     * @param array $arr2
     */
    protected function mergeInOneArr(array $arr1, array $arr2)
    {
        eee(array_merge($arr1, $arr2), __FILE__, __LINE__);
        array_walk($arr1, 
                function(&$v, $k) use($arr2)
                    {
                        $v['fake'] = array_shift($arr2[$k]);
                    }
                );
        eee($arr1, __FILE__, __LINE__);
        eee($arr2, __FILE__, __LINE__);
        return $arr1;
    }
    
    /**
     * 
     * @param array $arr
     */
    protected function finalRotate(array $arr)
    {
        $res = [];
        
        foreach ($arr as $k => $v)
        {
            $eng = array_shift($v);
            $rand = mt_rand(111, 222);
            $word1 = ($rand % 2 == 0) ? array_shift($v) : array_pop($v);
            $word2 = array_shift($v);
            $elem = array($eng, $word1, $word2);
            $res[$k] = $elem;

            eee($res[$k], __FILE__, __LINE__);
        }
        
        return $res;
    }
}

