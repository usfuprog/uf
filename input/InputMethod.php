<?php
require_once 'InputExec.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InputMethod
 *
 * @author usfuprog
 */

abstract class InputMethod implements InputExec
{
    protected static $wrapObj;
    
    static public function setWrapObj(\stdClass $obj) 
    {
        static::$wrapObj = $obj;
//        eee("HURA INPUT", __FILE__, __LINE__);
    }
    
    /**
     * 
     * @param array $arr1
     * @param array $arr2
     */
    protected function mergeInOneArr(array $arr1, array $arr2)
    {
//        eee(array_merge($arr1, $arr2), __FILE__, __LINE__);
        array_walk($arr1, 
                function(&$v, $k) use($arr2)
                    {
                        $v['fake'] = array_shift($arr2[$k]);
                    }
                );
//        eee($arr1, __FILE__, __LINE__);
//        eee($arr2, __FILE__, __LINE__);
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
            
//            eee($res[$k], __FILE__, __LINE__);
        }
        
        return $res;
    }
    /**
     * 
     * @param array $arr
     * @return array
     */
    protected function makeFakeFromSelected(array $arr)
    {
        $res = [];
//        eee($arr, __FILE__, __LINE__);
        foreach ($arr as $k => $v)
        {
//            eee($v);
            $keys = array_rand($arr, 2);
            $randKey = $keys[0] == $k ? $keys[1] : $keys[0];
//            eee($randKey . " ___ " . $keys[0] . " ___ " . $keys[1]);
            $res[] = array($arr[$randKey]['f']);
        }
        
        return $res;
    }
}
