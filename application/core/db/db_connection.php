<?php
class DbConnection{
    
    private static $mysqli; 

    private function __construct(){}
    
    private function __clone(){}
    
    private function __wakeup(){}
    
    public static function getInstance(){
        require_once dirname(dirname(__FILE__))."/config.php";
        if(!is_object(self::$mysqli)){
            self::$mysqli = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_NAME);
        }
        return self::$mysqli; 
    }
    
    private function __destruct() {
        if(is_object(self::$mysqli)){
            self::$mysqli = self::$mysqli->close(); 
        }
    }
    
}

