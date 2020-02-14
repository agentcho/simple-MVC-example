<?php
class AboutController extends Controller{
    public function actionIndex() {
        $this->view->render("about.php");
    }
}

