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
    
}
