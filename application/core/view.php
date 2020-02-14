<?php 
class View {
    function render($view_file, $data=array()){

        require_once dirname(dirname(__FILE__))."/view/".$view_file; 

    }
    
    function redirect($url){
        /**
         * @todo Разобраться с отправкой заголовков, вместо того чтобы вырубать предупреждения
         */
	@header('Location:'.$url);
    }
}