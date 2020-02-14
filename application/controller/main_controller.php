<?php
class MainController extends Controller{
    
    public function actionIndex(){
        $this->view->render("main.php",array()); 
    }

}

