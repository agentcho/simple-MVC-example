<?php
class AdminController extends Controller{
    
    public $model; 

    public function __construct() {
        parent::__construct();
        session_start();
        $this->model = new Model_Admin();
        
    }
    
    public function actionIndex(){
        if(!isset($_SESSION['groupid']) || empty($_SESSION['groupid'])){
            $this->view->redirect("/index.php?route=main/index");
            
        }
        $data = array(); 
        
        $data = $this->model->getData("users"); 
        
        
        $this->view->render("admin.php", $data); 
    }
    
    public function actionAdd(){
        $this->model->insert("users", $_POST); 
        echo json_encode(array("message"=>"success"));
    }
    
    public function actionEdit(){
        $data = $_POST; 
        
        $where = array("id" => $_POST["userid"]); 
        
        unset($_POST['userid']); 
        
        $this->model->update("users",$_POST,$where); 
        
        echo json_encode(array("message"=>"success"));
    }
    
    public function actionRemove(){
        if(isset($_POST['id'])){
            $this->model->removeOne("users",array("id" => $_POST['id']));
        }
        echo json_encode(array("message"=>"success"));
    }
    
    public function actionGetUser(){
        $data = array(); 
        if(isset($_POST['id'])){
             $data = $this->model->getOne("users",array("id" => $_POST["id"]));
        }
        if(!empty($data)){
            echo json_encode(array("message"=>"success", "data" => $data)); 
        } else {
            echo json_encode(array("message" => "error", "data" => null));
        }
        
       
        
    }
    
     
    
}

