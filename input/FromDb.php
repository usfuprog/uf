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
    public function __construct() 
    {
        $conn = new db4ever();
        if(rand(0, 1))$conn->closeConnection();
        $conn->query(0);
    }
    
    public function getData()
    {
        eee("fromdb", __FILE__, __LINE__);
    }
    
}
