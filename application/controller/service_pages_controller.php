<?php
class ServicePagesController extends Controller{
    public function actionError404(){
        $data = array(); 
        
        $this->view->render("error404.php", $data); 
    }
    
    
}

