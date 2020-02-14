<?php
class PageController extends Controller {
    /**
     * Контроллер для обработки обычных страниц
     */
    public $model; 
    
    public function __construct() {
        parent::__construct();
        $this->model = new Model_Page(); 
    }
    
    public function actionIndex() {
        $data = array();
  
        if(isset($_GET['id'])){
            $data = $this->model->getOne("pages", array("id" => $_GET['id'])); 
        }
        
        
        $this->view->render("page.php", $data);
    }
}
