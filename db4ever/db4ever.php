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
     * 
     */
    public function __construct()
    {
        try
        {
            if (static::$obj == null)
            {
                static::$obj = new PDO("mysql:host=localhost;dbname=engFra", DB_USER, DB_PASS);
                eee("set");
            }
            else
                eee("exist!!!");
        } catch (PDOException $e)
        {
            throw new PDOException("connection FAIL !!!" . $e->getMessage());
        }
        
        $this->querys[] = "SELECT * FROM fra";
    }
    
    public function query($num)
    {
        echo $this->querys[$num];
    }
    /**
     * 
     */
    public function closeConnection()
    {
        static::$obj = null;
        eee("unset");
    }
        
}
