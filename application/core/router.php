<?php
class Router {

	static function start(){
		$url_parts = parse_url($_SERVER['REQUEST_URI']); 
		
                $routes = "main/index"; 
                
                if(isset($_GET['route'])){
                    $routes = explode("/", $_GET['route']); 
                }
                
		$controller_name = "main"; 
		$action = "index"; 
		
		if(!empty($routes[0])){
			$controller_name = $routes[0];
		}
		
		if(!empty($routes[1])){
			$action = $routes[1];
		}
		
		$model_name = "Model_".$controller_name;
		$model_filename = strtolower($model_name).".php"; 
		$model_filepath = dirname(dirname(__FILE__))."/model";
		
		if(file_exists($model_filepath."/".$model_filename)){
			require_once $model_filepath."/".$model_filename;
		} 
		
		$controller_name = $controller_name."_Controller";
		$controller_filename = strtolower($controller_name).".php"; 
               
		$controller_filepath = dirname(dirname(__FILE__))."/controller";
		
		try{
                    if(file_exists($controller_filepath."/".$controller_filename)){

                        require_once $controller_filepath."/".$controller_filename;

                    } else {
                        throw new CoreRouteException("Контроллер ".$controller_filename. " не существует");
                    }
			
			
		} catch(CoreRouteException $e){
                    $e->redirectOnError404Page(); 
                    // echo $e->getMessage(); 
		}
                
                $controller_name = self::transformFilename($controller_filename); 
                
                $controller = new $controller_name();  
                
                $action_name = "action".ucfirst($action); 

                if(method_exists($controller, $action_name)){
                    $controller->$action_name(); 
                } else {
                    throw new CoreRouteException("Попытка вызвать несуществующий метод: ".$action_name." в контроллере: ".$controller_filename);
                }
     
		
	}
        
        private static function transformFilename($filename){
            $filename = pathinfo($filename, PATHINFO_FILENAME); 
            $parts = explode("_", $filename); 
            $result = ""; 
            
            foreach($parts as $key => $part){
                $result .= ucfirst($part);
            }
            
            return $result; 
        }
}

