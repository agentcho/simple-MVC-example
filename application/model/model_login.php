<?php
class Model_Login extends Model{
    public function __construct() {
        parent::__construct();
    }
    
//    public function getData($text){
//        
//    }
//    
//    public function query($text){
//        
//    }
       
       /**
        * 
        * @param type $username
        * @param type $password
        * @return type - id группы пользователей
        */ 
       public function getUserGroupId($username, $password){
           $query = $this->query("SELECT `groupid` FROM `users` WHERE `username` = '".$this->escape($username)."' AND `password` = '".$this->escape($password)."'"); 
         
           $status = 0; 
           if (count($query) > 0){
               foreach($query as $key => $value){
                   $status = $value['groupid'];
               }
           }
           return $status; 
       }
       
       
}
