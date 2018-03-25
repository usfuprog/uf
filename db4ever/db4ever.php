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
        
        $this->querys[] = "SELECT * FROM fra ORDER BY RAND() LIMIT 10;";
    }
    
    /**
     * Take query from query array and send it to a database server.
     * @param type $num
     */
    public function query($num)
    {
        echo $this->querys[$num];
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
