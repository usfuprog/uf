<?php
//                       in func 3(and other?), if limit empty make error. Fix.
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
                static::$obj = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            
        } catch (PDOException $e)
        {
            throw new PDOException("connection FAIL !!!" . $e->getMessage());
        }
        
        $this->querys[] = "";
        $this->querys[] = //func1, func3
        "SELECT eng.word e, fra.word f FROM eng, fra, mt_eng_fra WHERE eng.id = mt_eng_fra.eng_id AND "
                . "fra.id = mt_eng_fra.fra_id ORDER BY e";
        $this->querys[] = //func2
                "SELECT word FROM :tbl ORDER BY RAND() LIMIT :limit";
        $this->querys[] = //func3
                "SELECT word FROM fra WHERE word NOT IN(:notIn) ORDER BY RAND() LIMIT :limit";
        $this->querys[] = 
                "SELECT ";
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
        
        $arr = func_get_args();
        $num = abs(array_shift($arr));
        
        if (!$num || !in_array("func" . $num, get_class_methods(self::class)))
            return null;
        
//        $res = static::$obj->query($this->querys[$num]);
        $func = "func" . $num;
        
        $res = $this->$func($arr);
        
        return $res;
    }
    
    /**
     * Return all words from db, that have english to french translation.
     */
    private function func1($arr)
    {
        $res = static::$obj->query($this->querys[1]);
//        error_log(count($res), 3, __FILE__ . ".txt");
        return $res->fetchAll();
    }
    
    /** Call with array, first argument is count of words, second - table.
     * Return specified count words from this table.
     * [0] - countWords, [1] - table
     */
    private function func2($arr)
    {
//        eee($arr, __FILE__, __LINE__);
        $quest = $this->querys[2];
//        eee($quest);
//        array_pop($arr);
//        eee($arr);
        
//        $stm = self::$obj->prepare($quest);
        
        $limit = filter_var(array_shift($arr), FILTER_VALIDATE_INT, array('options'=>array('min_range'=>1, 'max_range'=>100)));
        $table = filter_var(array_shift($arr), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!$limit OR !$table)
            throw new Exception("Incorrect input: " . $limit . "___" . $table . " ___ " . $quest);
//        eee($table);
//        eee($stm->bindParam(':limit', $tmp, PDO::PARAM_INT));
//        eee($tmp);
//        $ok = $stm->execute();
        $quest = str_replace(":limit", intval($limit), $quest);
        $quest = str_replace(":tbl", strval($table), $quest);//quest last
//        eee($quest);
        $ok = self::$obj->query($quest);
        if (!$ok)
            throw new Exception(implode("", self::$obj->errorInfo()) . "___" . $quest);
        
//        return $stm->fetchAll();
        return $ok->fetchAll(PDO::FETCH_NUM);
    }
    
    /**
     * [0] - countWords
     */
    private function func3($arr)
    {
//        eee(array_shift($arr), __FILE__, __LINE__);
        $limit = filter_var(array_shift($arr), FILTER_VALIDATE_INT, array('options'=>array('min_range'=>1, 'max_range'=>100)));
        $quest = $this->querys[1] . " LIMIT $limit";
        $quest = str_replace("ORDER BY e", "ORDER BY RAND()", $quest);
//        eee($quest);
        $ok = self::$obj->query($quest);
        if (!$ok)
            throw new Exception(implode("", self::$obj->errorInfo()) . "___" . $quest);
        
        $engFraWords = $ok->fetchAll(PDO::FETCH_NAMED);
//        eee($engFraWords, __FILE__, __LINE__);
//        $notIn = $this->query(4, $limit, $engFraWords);
//        return $stm->fetchAll(PDO::FETCH_NUM);
//        eee($notIn, __FILE__, __LINE__);
        return $engFraWords;
    }
    /**
     * Call with array of french words. 
     * Return french words from db, with garancy, that there is no occurence of words from input array in return array.
     * [0] - countWords, [1] - input array
     */
    private function func4($arr)
    {
        $limit = filter_var(array_shift($arr), FILTER_VALIDATE_INT, array('options'=>array('min_range'=>1, 'max_range'=>100)));
        $fraWords = array_shift($arr);
        
        $notIn = [];
        foreach ($fraWords as $word)
        {
            $notIn[] = $word['f'];
        }
//        eee($notIn, __FILE__, __LINE__);
        $quest2 = $this->prepQuestEnough(count($notIn));
//        eee($quest2);
        $quest3 = $this->querys[3];
//        eee($quest3);
        $quest3 = str_replace(":notIn", $quest2, $quest3);
//        eee($quest3);
        $quest3 = str_replace(":limit", strval($limit), $quest3);//quest3 last
//        eee($quest3);
        $stm = self::$obj->prepare($quest3);
        $ok = $stm->execute($notIn);
        if (!$ok)
            throw new Exception(implode("", self::$obj->errorInfo()) . "___" . $quest3);
        
        return $stm->fetchAll(PDO::FETCH_NUM);
    }
    /**
     * 
    */
    public function func5($arr)
    {
       $words = array_shift($arr);
       eee($words, __FILE__, __LINE__);
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
    /**
     * 
     * @param int $num
     * @return string
     */
    private function prepQuestEnough($num)
    {
        $tmp = str_replace("?", "?, ", str_pad("", $num, "?"));
        
        $res = substr($tmp, 0, strlen($tmp) - 2);
        
        return $res;
    }
}