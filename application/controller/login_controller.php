<?php
class LoginController extends Controller{
    
    public function __construct(){
        parent::__construct(); 
        $this->model = new Model_Login(); 
        session_start();
    }
    public function actionIndex(){
        $this->view->render("login.php");
    }

    public function actionLogin(){
        $group_id = $this->model->getUserGroupId($_POST['login'], $_POST['password']); 
        switch($group_id){
            case 1 : {
                // админ
                $_SESSION['groupid'] = 1; 
                $_SESSION['userid'] = 1; // идентификатор пользователя, для простоты не используется 
                
                $this->view->redirect("/index.php?route=admin/index"); 
                break; 
            }
            case 6 : {
                // обычный пользователь
                $_SESSION['groupid'] = 6; 
                $_SESSION['userid'] = 2;
                $data["username"] = "Пользователь";
                $this->view->render("account.php", $data);
                $this->view->redirect("/index.php?route=account/index");
                break; 
            }
            default : {
                // для простоты считаем этот случай неправильным вводом пароля / логина 
                $data['message'] = "Вы ввели неправильный логин и/или пароль или такой пользователь еще не зарегистрирован"; 
                $this->view->render("login.php", $data);
                $this->view->redirect("/index.php?route=login/index"); 
                break; 
            }
        }
        

    }
    
    public function actionLogout(){
        session_destroy(); 
        $this->view->redirect("/index.php?route=main");
    }
    
}
