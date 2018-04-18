<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db4ever
 *
 * @author usfuprog
 */
class db4ever
{
    private static $obj = null;
    private $querys = [];
    
    /**
     * Create connection to a database if it is not set.
     */
    public function __construct()
    {
        try
        {
            if (static::$obj == null)
                static::$obj = new PDO("mysql:host=localhost;dbname=engFra", DB_USER, DB_PASS);
            
        } catch (PDOException $e)
        {
            throw new PDOException("connection FAIL !!!" . $e->getMessage());
        }
        
        $this->querys[] = "";
        $this->querys[] = //func1
        "SELECT eng.word e, fra.word f FROM eng, fra, mt_eng_fra WHERE eng.id = mt_eng_fra.eng_id AND "
                . "fra.id = mt_eng_fra.fra_id ORDER BY e";
        $this->querys[] = //func2
                "SELECT word FROM fra ORDER BY RAND() LIMIT :limit";
//                "SELECT * FROM fra WHERE id = ?";
//SELECT eng.word, fra.word FROM eng, fra, mt_eng_fra WHERE eng.id = mt_eng_fra.eng_id AND 
//fra.id = mt_eng_fra.fra_id ORDER BY RAND() LIMIT 10;
    }
    
    /**
     * Controlle if connection active, if query number specify, and if exist function, that will work with those
     * parameters. Than call this function, and that function will create query to db, with order from querys array.
     * Get results from db and return to function query. All this allow hold all querys in one place, and all functions 
     * that work with db also. That means, if db type will change from MySQL, it will possible make this changes easy.
     * Beside this, in different class where func query called, is possible make log message, and have list of all 
     * cdb calls from "entire" aplication. 
     * @return mixed(what other functions return to function query).
     */
    public function query()
    {
//        eee(get_class_methods(self::class), __FILE__, __LINE__);
//        eee(static::$obj, __FILE__, __LINE__);
        
        if (func_num_args() < 1 || !static::$obj)
            return null;
        
        $num = abs(func_get_arg(0));
        if (!$num || !in_array("func" . $num, get_class_methods(self::class)))
            return null;
        
//        $res = static::$obj->query($this->querys[$num]);
        $func = "func" . $num;
        $res = $this->$func(func_get_args());
        
        
        return $res;
    }
    
    /**
     * Return all words from db, that have english to french translation.
     */
    private function func1($arr)
    {
        $res = static::$obj->query($this->querys[$arr[0]]);
        return $res->fetchAll();
    }
    
    /**
     * 
     */
    private function func2($arr)
    {
        eee($arr, __FILE__, __LINE__);
        $quest = $this->querys[array_shift($arr)];
        eee($quest);
        array_pop($arr);
        eee($arr);
        
//        $stm = self::$obj->prepare($quest);
        $limit = array_pop($arr);
        eee($limit);
//        eee($stm->bindParam(':limit', $tmp, PDO::PARAM_INT));
//        eee($tmp);
//        $ok = $stm->execute();
        $quest = str_replace(":limit", strval($limit), $quest);
        eee($quest);
        $ok = self::$obj->query($quest);
        if (!$ok)
            throw new Exception(implode("", $stm->errorInfo()) . "___" . $quest);
        
//        return $stm->fetchAll();
        return $ok->fetchAll();
    }
    
    
    
    
    /**
     * Destroy connection to a database.
     */
    public function closeConnection()
    {
        static::$obj = null;
        eee("unset", __FILE__, __LINE__);
    }
    /**
     * Return object of class db4ever into outer class.
     */
    public function getConnectionObj()
    {
        return $this;
    }
}
