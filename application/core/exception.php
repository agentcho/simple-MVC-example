<?php
class CoreRouteException extends Exception{
	public function log(){
		
	}
        
    public function redirectToMainpage(){
        header('Location:/index.php?route=main');
        exit(); 
    }    
    
    public function redirectOnError404Page(){
        header('Location: /index.php?route=service_pages/error404');
    }
}

class DatabaseException extends Exception{
    
}