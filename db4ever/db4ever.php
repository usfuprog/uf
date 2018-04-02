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
        
        $this->querys[0] = "SELECT * FROM fra ORDER BY RAND() LIMIT 10;";
        $this->querys[1] = 
        "SELECT eng.word e, fra.word f FROM eng, fra, mt_eng_fra WHERE eng.id = mt_eng_fra.eng_id AND "
                . "fra.id = mt_eng_fra.fra_id ORDER BY e";
    }
    
    /**
     * Take query from query array and send it to a database server.
     * @param type $num
     */
    public function query($num)
    {
        if (!static::$obj)
            return null;
        
        $res = static::$obj->query($this->querys[1]);
        
        return $res->fetchAll();
    }
    /**
     * Destroy connection to a database.
     */
    public function closeConnection()
    {
        static::$obj = null;
        eee("unset", __FILE__, __LINE__);
    }
        
}
