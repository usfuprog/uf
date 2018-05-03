<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlgoMethod
 * PURPOSE: this class is base for all algo*.php classes and it purpose contain methods, that is similar for all(or many) 
 * algo* classes, and provide public property, with results data, that will transfer data to template(and output than).
 * Classes algo* containt specific interface, for each case(algorythm). When algo* class go to output/input object, it 
 * provide specific API by itself, similar API functions in it parent(this class), and properties to save data result in 
 * it parent(this class). Also it have property to save outer(wrapper) object, to make accessible form data(settings) 
 * wich can be used in algorythm calculations. 
 * @author usfuprog
 */
class AlgoMethod 
{
    public $defaultEngFraWords;
    public $badTranslation;
    public $all;
    public $wrapperObj;
    
    public function setWrapper($obj)
    {
        $this->wrapperObj = $obj;
    }
    
    /**
     * Get array with word => translate in first argument, and 0 => word(fake) in second. Create in first 
     * array property 'fake' with words from second array.
     * @param array $arr1
     * @param array $arr2
     * @return array
     */
    public function mergeInOneArr(array $arr1, array $arr2)
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
     * Get array 0 => array(0 => word1, 1 => word2, 2 => word3), 1 => array( ... 
     * and randomly change position of words on second and third place. 
     * @param array $arr
     * @return array
     */
    public function finalRotate(array $arr)
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
     * Get array with property 'e' => word and 'f' => word and create array with one word(0 => word) with condition, 
     * that this word not equal to word in first array, under the same index. Means, if first 
     * array 0 => array('e' => fresh, 'f' => frais), in second array 0 => word can be any word from property 'f' from 
     * first array, BUT NEVER word 'frais'.
     * @param array $arr
     * @return array
     */
    public function makeFakeFromSelected(array $arr)
    {
        $res = [];
//        eee($arr, __FILE__, __LINE__);
        //"If we are lucky, there would be one word"
        if (count($arr) == 1)
        {
            $res[] = array($arr[0]['f'], $arr[0]['f']);// << ... >>
        }
        //"And if unlucky? There would be many words"
        else 
        {
            foreach ($arr as $k => $v)
            {
    //            eee($v);
                $keys = array_rand($arr, 2);
                $randKey = $keys[0] == $k ? $keys[1] : $keys[0];
    //            eee($randKey . " ___ " . $keys[0] . " ___ " . $keys[1]);
                $res[] = array($arr[$randKey]['f']);
            }
        }
//        eee($res, __FILE__, __LINE__);
        return $res;
    }
    
}
